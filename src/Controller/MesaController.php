<?php

namespace App\Controller;

use App\Entity\Mesa;
use App\Form\MesaType;
use App\Repository\MesaRepository;
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
    public function getMesas(MesaRepository $mesaRepository): Response
    {
        $mesas = $mesaRepository->findAll();
    
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
