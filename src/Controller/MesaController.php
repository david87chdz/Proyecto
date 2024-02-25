<?php

namespace App\Controller;

use App\Entity\Mesa;
use App\Form\MesaType;
use App\Repository\MesaRepository;
//use App\Repository\ReservaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/mesa')]
class MesaController extends AbstractController
{
    #[Route('/', name: 'app_mesa_index', methods: ['GET'])]
    public function index(MesaRepository $mesaRepository): Response
    {
        return $this->render('mesa/index.html.twig', [
            'mesas' => $mesaRepository->findAll(),
            'mesatam'=>$mesaRepository->mesasTamanio(3)
        ]);
    }

    #[Route('/getMesas', name: 'getMesas', methods: ['GET'])]
    public function getMesas(MesaRepository $mesaRepository, EntityManagerInterface $entityManager): Response
    {   

        $fechaActual = date("Y-m-d H:i:s");
        $mesas = $mesaRepository->findAll();
        $mesasOcupadas=$mesaRepository->mesasReservadas($fechaActual);
        foreach ($mesas as $mesa) {
            // Verificamos si la mesa está ocupada
            $ocupada = false;
            foreach ($mesasOcupadas as $mesaOcupada) {
                if ($mesa->getId() == $mesaOcupada->getId()) {
                    $ocupada = true;
                    break;
                }
            }
        
            // Cambiamos el estado de la mesa
            if ($ocupada) {
                $mesa->setDisponible(false);
            } else {
                $mesa->setDisponible(true);
            }
        
            // Guardamos los cambios en la base de datos
            $entityManager->persist($mesa);
        }
        
        // Aplicamos los cambios en la base de datos
        $entityManager->flush();
        $mesasArray= [];
        foreach ($mesas as $mesa) {
                $mesasArray[] = [
                    'id' => $mesa->getId(),
                    'disponible' => $mesa->isDisponible(),
                    'tipomesa' => $mesa->getTipoMesa()->getId(),
                ];
        }
    
        $jsonResponse = json_encode($mesasArray);
    
        $response = new Response($jsonResponse, Response::HTTP_OK);
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }

/*     #[Route('/getMesas', name: 'getMesas', methods: ['GET'])]
public function getMesas(MesaRepository $mesaRepository, EntityManagerInterface $entityManager): Response
{   

    // Obtener la fecha actual sin la parte de la hora
    $fechaActual = date("Y-m-d");

    // Obtener las mesas
    $mesas = $mesaRepository->findAll();

    // Obtener las mesas ocupadas para la fecha actual
    $mesasOcupadas = $mesaRepository->mesasReservadas($fechaActual);

    // Marcar las mesas según su disponibilidad
    foreach ($mesas as $mesa) {
        $ocupada = false;
        foreach ($mesasOcupadas as $mesaOcupada) {
            if ($mesa->getId() == $mesaOcupada->getId()) {
                $ocupada = true;
                break;
            }
        }

        // Establecer el estado de disponibilidad de la mesa
        $mesa->setDisponible(!$ocupada);

        // Guardar los cambios en la base de datos
        $entityManager->persist($mesa);
    }

    // Aplicar los cambios en la base de datos
    $entityManager->flush();

    // Preparar el array de mesas para la respuesta JSON
    $mesasArray = [];
    foreach ($mesas as $mesa) {
        $mesasArray[] = [
            'id' => $mesa->getId(),
            'disponible' => $mesa->isDisponible(),
            'tipomesa' => $mesa->getTipoMesa()->getId(),
        ];
    }

    // Convertir el array de mesas a JSON
    $jsonResponse = json_encode($mesasArray);

    // Crear la respuesta HTTP
    $response = new Response($jsonResponse, Response::HTTP_OK);
    $response->headers->set('Content-Type', 'application/json');
    
    // Devolver la respuesta
    return $response;
} */


    #[Route('/new', name: 'app_mesa_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $mesa = new Mesa();
        $form = $this->createForm(MesaType::class, $mesa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($mesa);
            $entityManager->flush();

            return $this->redirectToRoute('app_mesa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('mesa/new.html.twig', [
            'mesa' => $mesa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mesa_show', methods: ['GET'])]
    public function show(Mesa $mesa): Response
    {
        return $this->render('mesa/show.html.twig', [
            'mesa' => $mesa,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mesa_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Mesa $mesa, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MesaType::class, $mesa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_mesa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('mesa/edit.html.twig', [
            'mesa' => $mesa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mesa_delete', methods: ['POST'])]
    public function delete(Request $request, Mesa $mesa, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mesa->getId(), $request->request->get('_token'))) {
            $entityManager->remove($mesa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_mesa_index', [], Response::HTTP_SEE_OTHER);
    }
}
