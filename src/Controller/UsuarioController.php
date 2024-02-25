<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UsuarioType;
use App\Repository\UsuarioRepository;
//use App\Repository\RolRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

#[Route('/usuario')]
class UsuarioController extends AbstractController
{



    /* #[Route('/', name: 'app_usuario_index', methods: ['GET'])]
    public function index(UsuarioRepository $usuarioRepository): Response
    {
        return $this->render('usuario/index.html.twig', [
            'usuarios' => $usuarioRepository->findAll(),
        ]);
    }


    #[Route('/buscarUsuario', name: 'buscarUsuario', methods: ['POST'])]
    public function buscarUsuario(Request $request, EntityManagerInterface $entityManager, UsuarioRepository $usuarioRepository): Response
    {
        $data = json_decode($request->getContent(), true);

        $nickname = $data['nickname'];
        //$password = $data['password'];
        $password = $data['password'];
        
        $query = $usuarioRepository->createQueryBuilder('u')
            ->where('u.nickname = :nickname')
            ->andWhere('u.password = :password')
            ->setParameter('nickname', $nickname)
            ->setParameter('password', $password)
            ->getQuery();

            $user = $query->getOneOrNullResult();
       
        if($user){
            $responseData = [
                'usuario' => $user->getRol()->getNombre(),
                'nombre'=> $user->getNickname(), 
                'id' => $user->getId(),
                'fecha' => date("F j, Y, g:i a") 
            ];
            $statusCode = Response::HTTP_OK;
        } else {
            $responseData = [
                'mensaje' => 'Usuario no encontrado'
            ];
            $statusCode = Response::HTTP_NOT_FOUND;
        }

        $jsonResponse = json_encode($responseData);

        $response = new Response($jsonResponse, $statusCode);
        $response->headers->set('Content-Type', 'application/json');
    
        return $response;
    }
 */

 #[Route('/buscarUsuario', name: 'buscarUsuario', methods: ['POST'])]
 public function buscarUsuario(Request $request, EntityManagerInterface $entityManager, UsuarioRepository $usuarioRepository): Response
 {
     $data = json_decode($request->getContent(), true);
 
     $nickname = $data['nickname'];
     $passwordProvided = $data['password'];
     
     // Buscar el usuario por el nickname
     $user = $usuarioRepository->findOneBy(['nickname' => $nickname]);
 
     
     if($user && password_verify($passwordProvided, $user->getPassword())) {
         $responseData = [
             'usuario' => $user->getRol()->getNombre(),
             'nombre'=> $user->getNickname(), 
             'id' => $user->getId(),
             'puntuacion' => $user->getPuntuacion(),
             'fecha' => date("F j, Y, g:i a") 
         ];
         $statusCode = Response::HTTP_OK;
     } else {
        //Podemos trabajar con ello para mostrar mensaje
         $responseData = [
             'mensaje' => 'Usuario no encontrado o contraseña incorrecta'
         ];
         $statusCode = Response::HTTP_NOT_FOUND;
     }
 
     $jsonResponse = json_encode($responseData);
 
     $response = new Response($jsonResponse, $statusCode);
     $response->headers->set('Content-Type', 'application/json');
 
     return $response;
 }
 
/*     #[Route('/buscarUsuario', name: 'buscarUsuario', methods: ['POST'])]
public function buscarUsuario(Request $request, EntityManagerInterface $entityManager, UsuarioRepository $usuarioRepository): Response
{
    $data = json_decode($request->getContent(), true);

    $nickname = $data['nickname'];
    $password = $data['password'];

    // Buscar el usuario por su apodo (nickname)
    $user = $usuarioRepository->findOneBy(['nickname' => $nickname]);

    if ($user && password_verify($password, $user->getPassword())) {
        $responseData = [
            'usuario' => $user->getRol()->getNombre(),
            'id' => $user->getId(),
            'fecha' => date("F j, Y, g:i a") 
        ];
        $statusCode = Response::HTTP_OK;
    } else {
        $responseData = [
            'mensaje' => 'Usuario no encontrado o contraseña incorrecta'
        ];
        $statusCode = Response::HTTP_NOT_FOUND;
    }

    $jsonResponse = json_encode($responseData);

    $response = new Response($jsonResponse, $statusCode);
    $response->headers->set('Content-Type', 'application/json');

    return $response;
} */


    #[Route('/crearUsuario', name: 'crearUsuario', methods: ['POST'])]
    public function crearUsuario(Request $request, EntityManagerInterface $entityManager, UsuarioRepository $usuarioRepository): Response
    {
        $data = json_decode($request->getContent(), true);
        $nombre = $data['nombre'];
        $apellidos =$data['apellidos'];
        $nickname = $data['nickname'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $rol = $usuarioRepository->rolSocio('Socio');
        
        $nuevoUsuario= new Usuario();
        $nuevoUsuario= $nuevoUsuario->setNombre($nombre);
        $nuevoUsuario->setApellidos($apellidos);
        $nuevoUsuario->setNickname($nickname);
        $nuevoUsuario->setPassword($password);
        $nuevoUsuario->setPuntuacion(0);
        $nuevoUsuario->setRol($rol);

        $entityManager->persist($nuevoUsuario);
        $entityManager->flush();
        //creamos por defecto
        //$nuevoUsuario->setRol(2);

        $responseData = [
            'mensaje' => 'Usuario insertado correctamente',
            'usuario' => $nuevoUsuario->getRol()->getNombre(),
            'id' => $nuevoUsuario->getId(),
            'fecha' => date("F j, Y, g:i a") ,
            'puntuacion' => $nuevoUsuario->getPuntuacion()
        ];
        
        $jsonResponse = json_encode($responseData);
        
        $response = new Response($jsonResponse, Response::HTTP_CREATED);
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;

     
    }

    #[Route('/new', name: 'app_usuario_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($usuario);
            $entityManager->flush();

            return $this->redirectToRoute('app_usuario_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('usuario/new.html.twig', [
            'usuario' => $usuario,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_usuario_show', methods: ['GET'])]
    public function show(Usuario $usuario): Response
    {
        return $this->render('usuario/show.html.twig', [
            'usuario' => $usuario,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_usuario_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Usuario $usuario, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_usuario_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('usuario/edit.html.twig', [
            'usuario' => $usuario,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_usuario_delete', methods: ['POST'])]
    public function delete(Request $request, Usuario $usuario, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$usuario->getId(), $request->request->get('_token'))) {
            $entityManager->remove($usuario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_usuario_index', [], Response::HTTP_SEE_OTHER);
    }
}
