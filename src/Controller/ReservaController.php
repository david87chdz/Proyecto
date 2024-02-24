<?php

namespace App\Controller;

use App\Entity\Reserva;
use App\Form\ReservaType;
use App\Repository\ReservaRepository;
use App\Repository\JuegoRepository;
use App\Repository\UsuarioRepository;
use App\Repository\MesaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Datetime;
#[Route('/reserva')]
class ReservaController extends AbstractController
{
    #[Route('/', name: 'app_reserva_index', methods: ['GET'])]
    public function index(ReservaRepository $reservaRepository): Response
    {
        return $this->render('reserva/index.html.twig', [
            'reservas' => $reservaRepository->findAll(),
            'reservasPropias' =>$reservaRepository->reservasUsuarios('Miguel'),
            'reservasAdmin' =>$reservaRepository->reservasAdmin()
        ]);
    }


    #[Route('/buscarReserva', name: 'buscarReserva', methods: ['POST'])]
    public function buscarReserva(Request $request, EntityManagerInterface $entityManager, ReservaRepository $reservaRepository): Response
    {
        $data = json_decode($request->getContent(), true);
        $id = $data['id'];

        //Para ver si es admin o socio
        if($nombreRol=$reservaRepository->admin($id)=='Admin'){
            $reservas=$reservaRepository->reservasAdmin();
        }else{
            $reservas= $reservaRepository->reservasUsuarios($id);
        }
        

        if ($reservas) {
            $responseData = [];

            foreach ($reservas as $reserva) {
                $responseData[] = [
                    'id_reserva' => $reserva->getId(),
                    'usuario' => $reserva->getUsuario()->getNombre(),
                    'mesa' => $reserva->getMesa()->getId(),
                    'juego' => $reserva->getJuego()->getNombre(),
                    'fecha_inicio' => $reserva->getFechaInicio()->format('Y-m-d H:i:s'),
                    'fecha_fin' => $reserva->getFechaFin()->format('Y-m-d H:i:s'),
                    'estado' => $reserva->isCompletada(),
                ];
            }

            $statusCode = Response::HTTP_OK;
        } else {
            $responseData = [
                'mensaje' => 'No se encontraron reservas para el usuario con id: ' . $id
            ];
            $statusCode = Response::HTTP_NOT_FOUND;
        }

        return $this->json($responseData, $statusCode);
    }


    #[Route('/aniadirReserva', name: 'aniadirReserva', methods: ['POST'])]
    public function aniadirReserva(Request $request, JuegoRepository $juegoRepository,
     EntityManagerInterface $entityManager, Usuariorepository $usuarioRepository,
     ReservaRepository $reservaRepository, MesaRepository $mesaRepository): Response
    {
        $data = json_decode($request->getContent(), true);
        
        $fecha_inicio = $data['fecha_inicio'];
        $fecha_inicio = new DateTime($fecha_inicio);
        $fecha_fin = $data['fecha_fin'];
        $fecha_fin = new DateTime($fecha_fin);

        $juego_id = $data['juego_id'];
        $usuario_id = $data['usuario_id'];
        $mesa_id = $data['mesa_id'];
        $juego = $juegoRepository->juegoId($juego_id);
        //$juego = $entityManagerentity-($juego_id);
        $mesa = $mesaRepository->mesaId($mesa_id);
        $usuario = $usuarioRepository->usuarioId($usuario_id);
        $puntuacion=$usuario->getPuntuacion();
        
        
        $reserva = new Reserva();
    
        $reserva->setFechaInicio($fecha_inicio);
        $reserva->setFechaFin($fecha_fin);
        $reserva->setUsuario($usuario);
        $reserva->setMesa($mesa);
        $reserva->setJuego($juego);
        $reserva->setCompletada(0);
        $entityManager->persist($reserva);
        $entityManager->flush();
    
        $responseData = [];
    
        if ($reserva->getId()) {
            //Añadimos puntuación
            $usuario->setPuntuacion($puntuacion+1);
            $entityManager->persist($usuario);
            $entityManager->flush();
            $mensaje = 'La reserva se ha insertado correctamente.';
            $statusCode = Response::HTTP_OK;
        } else {
            // Si hubo un error al insertar
            $mensaje = 'Ha ocurrido un error al insertar la reserva.';
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
    
        $responseData['mensaje'] = $mensaje;
    
        return $this->json($responseData, $statusCode);
    }


    #[Route('/cambiarReserva', name: 'cambiarReserva', methods: ['POST', 'PUT'])]
    public function cambiarReserva(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);
    
        $id = $data['id'];
        
        // Buscar la reserva por su ID
        $reserva = $entityManager->getRepository(Reserva::class)->find($id);
    
        // Verificar si la reserva existe
        if (!$reserva) {
            throw $this->createNotFoundException('No se encontró ninguna reserva para el ID '.$id);
        }
    
        // Obtener el usuario asociado a la reserva
        $usuario = $reserva->getUsuario();
    
        // Actualizar la puntuación del usuario
        $puntuacion = $usuario->getPuntuacion();
        $usuario->setPuntuacion($puntuacion - 2);
        $entityManager->persist($usuario);
    
        // Marcar la reserva como no completada
        $reserva->setCompletada(1);
        $entityManager->persist($reserva);
    
        // Guardar los cambios en la base de datos
        $entityManager->flush();
    
        // Devolver una respuesta JSON
        $responseData = [
            'mensaje' => 'Reserva modificada correctamente'
        ];
        $jsonResponse = json_encode($responseData);
        $response = new Response($jsonResponse, Response::HTTP_OK);
        $response->headers->set('Content-Type', 'application/json');
    
        return $response;
    }
    

    #[Route('/new', name: 'app_reserva_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reserva = new Reserva();
        $form = $this->createForm(ReservaType::class, $reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reserva);
            $entityManager->flush();

            return $this->redirectToRoute('app_reserva_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reserva/new.html.twig', [
            'reserva' => $reserva,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reserva_show', methods: ['GET'])]
    public function show(Reserva $reserva): Response
    {
        return $this->render('reserva/show.html.twig', [
            'reserva' => $reserva,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reserva_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reserva $reserva, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservaType::class, $reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reserva_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reserva/edit.html.twig', [
            'reserva' => $reserva,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reserva_delete', methods: ['POST'])]
    public function delete(Request $request, Reserva $reserva, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reserva->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reserva);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reserva_index', [], Response::HTTP_SEE_OTHER);
    }
}
