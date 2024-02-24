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



    #[Route('/modificaJuego', name: 'modificaJuego', methods: ['POST', 'PUT'])]
    public function modificaJuego(Request $request, EntityManagerInterface $entityManager): Response
    {
       
        $data = json_decode($request->getContent(), true);

        $id = $data['id'];
        $nombre = $data['nombre'];
        $max_jug = $data['max_jug'];
        $min_jug = $data['min_jug'];

       
        $juego = $entityManager->getRepository(Juego::class)->find($id);

     
        if (!$juego) {
            throw $this->createNotFoundException('No se encontró ningún juego para el ID '.$id);
        }


        $juego->setNombre($nombre);
        $juego->setMaxJug($max_jug);
        $juego->setMinjug($min_jug);


        $entityManager->flush();

      
        $responseData = [
            'mensaje' => 'Datos del juego actualizados correctamente'
        ];
        $jsonResponse = json_encode($responseData);
        $response = new Response($jsonResponse, Response::HTTP_OK);
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
                    'imagen'=> "iVBORw0KGgoAAAANSUhEUgAAAfQAAAH0CAYAAADL1t+KAAAAAXNSR0IArs4c6QAAAARzQklUCAgICHwIZIgAAAAJcEhZcwAADsQAAA7EAZUrDhsAAARraVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49J++7vycgaWQ9J1c1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCc/Pgo8eDp4bXBtZXRhIHhtbG5zOng9J2Fkb2JlOm5zOm1ldGEvJz4KPHJkZjpSREYgeG1sbnM6cmRmPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjJz4KCiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0nJwogIHhtbG5zOkF0dHJpYj0naHR0cDovL25zLmF0dHJpYnV0aW9uLmNvbS9hZHMvMS4wLyc+CiAgPEF0dHJpYjpBZHM+CiAgIDxyZGY6U2VxPgogICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSdSZXNvdXJjZSc+CiAgICAgPEF0dHJpYjpDcmVhdGVkPjIwMjQtMDItMjQ8L0F0dHJpYjpDcmVhdGVkPgogICAgIDxBdHRyaWI6RXh0SWQ+M2U3YjQxNGEtMTAzZS00YTg1LWJmZmYtZWM0YTUyYjYyMzA3PC9BdHRyaWI6RXh0SWQ+CiAgICAgPEF0dHJpYjpGYklkPjUyNTI2NTkxNDE3OTU4MDwvQXR0cmliOkZiSWQ+CiAgICAgPEF0dHJpYjpUb3VjaFR5cGU+MjwvQXR0cmliOlRvdWNoVHlwZT4KICAgIDwvcmRmOmxpPgogICA8L3JkZjpTZXE+CiAgPC9BdHRyaWI6QWRzPgogPC9yZGY6RGVzY3JpcHRpb24+CgogPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9JycKICB4bWxuczpkYz0naHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8nPgogIDxkYzp0aXRsZT4KICAgPHJkZjpBbHQ+CiAgICA8cmRmOmxpIHhtbDpsYW5nPSd4LWRlZmF1bHQnPkRTIC0gNDwvcmRmOmxpPgogICA8L3JkZjpBbHQ+CiAgPC9kYzp0aXRsZT4KIDwvcmRmOkRlc2NyaXB0aW9uPgoK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"

                ];
            }else{
                $juegosArray[] = [
                    'id' => $juego->getId(),
                    'nombre' => $juego->getNombre(),
                    'min_jug' => $juego->getMinJug(),
                    'max_jug' => $juego->getMaxJug(),
                    'tipomesa' => $juego->getTipoMesa(),
                    'imagen'=> base64_encode(stream_get_contents($juego->getImagen()))
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
