<?php

namespace App\Controller;

use App\Entity\Rencontre;
use App\Form\RencontreForm;
use App\Repository\RencontreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/rencontre')]
final class RencontreController extends AbstractController
{
    #[Route(name: 'app_rencontre_index', methods: ['GET'])]
    public function index(RencontreRepository $rencontreRepository): Response
    {
        return $this->render('rencontre/index.html.twig', [
            'rencontres' => $rencontreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_rencontre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rencontre = new Rencontre();
        $form = $this->createForm(RencontreForm::class, $rencontre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rencontre);
            $entityManager->flush();

            return $this->redirectToRoute('app_rencontre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('rencontre/new.html.twig', [
            'rencontre' => $rencontre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rencontre_show', methods: ['GET'])]
    public function show(Rencontre $rencontre): Response
    {
        return $this->render('rencontre/show.html.twig', [
            'rencontre' => $rencontre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_rencontre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Rencontre $rencontre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RencontreForm::class, $rencontre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_rencontre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('rencontre/edit.html.twig', [
            'rencontre' => $rencontre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rencontre_delete', methods: ['POST'])]
    public function delete(Request $request, Rencontre $rencontre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rencontre->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($rencontre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_rencontre_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/rencontre/{id}/valider', name: 'rencontre_valider')]
    public function valider(Rencontre $rencontre, EntityManagerInterface $entityManager): Response
    {
        $rencontre->setValide(true);
        $entityManager->flush();

        $this->addFlash('success', 'La rencontre a été validée.');
        return $this->redirectToRoute('app_rencontre_index'); // adapte si tu as une autre route
    }
}

