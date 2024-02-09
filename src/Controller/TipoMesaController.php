<?php

namespace App\Controller;

use App\Entity\TipoMesa;
use App\Form\TipoMesaType;
use App\Repository\TipoMesaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/tipo/mesa')]
class TipoMesaController extends AbstractController
{
    #[Route('/', name: 'app_tipo_mesa_index', methods: ['GET'])]
    public function index(TipoMesaRepository $tipoMesaRepository): Response
    {
        return $this->render('tipo_mesa/index.html.twig', [
            'tipo_mesas' => $tipoMesaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tipo_mesa_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tipoMesa = new TipoMesa();
        $form = $this->createForm(TipoMesaType::class, $tipoMesa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tipoMesa);
            $entityManager->flush();

            return $this->redirectToRoute('app_tipo_mesa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tipo_mesa/new.html.twig', [
            'tipo_mesa' => $tipoMesa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tipo_mesa_show', methods: ['GET'])]
    public function show(TipoMesa $tipoMesa): Response
    {
        return $this->render('tipo_mesa/show.html.twig', [
            'tipo_mesa' => $tipoMesa,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tipo_mesa_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TipoMesa $tipoMesa, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TipoMesaType::class, $tipoMesa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_tipo_mesa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tipo_mesa/edit.html.twig', [
            'tipo_mesa' => $tipoMesa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tipo_mesa_delete', methods: ['POST'])]
    public function delete(Request $request, TipoMesa $tipoMesa, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoMesa->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tipoMesa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_tipo_mesa_index', [], Response::HTTP_SEE_OTHER);
    }
}
