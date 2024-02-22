<?php

namespace App\Controller;

use App\Entity\Juego;
use App\Form\JuegoType;
use App\Repository\JuegoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
//Para los json
use Symfony\Component\HttpFoundation\JsonResponse;


#[Route('/juego')]
class JuegoController extends AbstractController
{
    #[Route('/', name: 'app_juego_index', methods: ['GET'])]
    public function index(JuegoRepository $juegoRepository): Response
    {
        return $this->render('juego/index.html.twig', [
            'juegos' => $juegoRepository->findAll(),
        ]);
    }

    
    #[Route('/insertarJuego', name: 'insertarJuego', methods: ['POST'])]
    public function insertarJuego(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        // Crear una instancia de Juego
        $nuevoJuego = new Juego();
        $nuevoJuego->setNombre($data['nombre']);
        $nuevoJuego->setMinJug($data['min_jug']);
        $nuevoJuego->setMaxJug($data['max_jug']);
        
        // Resto de campos que locura con los objetos

        
        //$entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($nuevoJuego);
        $entityManager->flush();


        $responseData = [
            'mensaje' => 'Juego insertado correctamente'
        ];
        
        $jsonResponse = json_encode($responseData);
        
        $response = new Response($jsonResponse, Response::HTTP_CREATED);
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }

    #[Route('/getJuegos', name: 'getJuegos', methods: ['GET'])]
    public function getTodas(JuegoRepository $juegoRepository): Response
    {
        $juegos = $juegoRepository->findAll();
    
        $juegosArray = [];
        foreach ($juegos as $juego) {
            if(!$juego->getImagen()){
                $juegosArray[] = [
                    'id' => $juego->getId(),
                    'nombre' => $juego->getNombre(),
                    'min_jug' => $juego->getMinJug(),
                    'max_jug' => $juego->getMaxJug(),
                    'tipomesa' => $juego->getTipoMesa(),
                    'imagen'=> "no tiene"
                    //'imagen' => $juego->getImagen(),
                    // Añadir el resto
                ];
            }else{
                $juegosArray[] = [
                    'id' => $juego->getId(),
                    'nombre' => $juego->getNombre(),
                    'min_jug' => $juego->getMinJug(),
                    'max_jug' => $juego->getMaxJug(),
                    'tipomesa' => $juego->getTipoMesa(),
                    'imagen'=> base64_encode(stream_get_contents($juego->getImagen()))
                    
                    //'imagen' => $juego->getImagen(),
                    // Añadir el resto
                ];
            }
           
        }
    
        $jsonResponse = json_encode($juegosArray);
    
        $response = new Response($jsonResponse, Response::HTTP_OK);
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }

    #[Route('/new', name: 'app_juego_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $juego = new Juego();
        $form = $this->createForm(JuegoType::class, $juego);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($juego);
            $entityManager->flush();

            return $this->redirectToRoute('app_juego_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('juego/new.html.twig', [
            'juego' => $juego,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_juego_show', methods: ['GET'])]
    public function show(Juego $juego): Response
    {
        return $this->render('juego/show.html.twig', [
            'juego' => $juego,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_juego_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Juego $juego, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JuegoType::class, $juego);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_juego_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('juego/edit.html.twig', [
            'juego' => $juego,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_juego_delete', methods: ['POST'])]
    public function delete(Request $request, Juego $juego, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$juego->getId(), $request->request->get('_token'))) {
            $entityManager->remove($juego);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_juego_index', [], Response::HTTP_SEE_OTHER);
    }


    

}
