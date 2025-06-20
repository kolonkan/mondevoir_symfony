<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UserController extends AbstractController
{
    #[Route('/admin/create/joueur', name: 'create_joueur')]
    #[IsGranted('ROLE_ADMIN')]
    public function createJoueur(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(['ROLE_JOUEUR']);
            $user->setPassword($hasher->hashPassword($user, $user->getPassword()));
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Joueur créé avec succès');
            return $this->redirectToRoute('home');
        }

        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
            'type' => 'joueur',
        ]);
    }

    #[Route('/admin/create/entraineur', name: 'create_entraineur')]
    #[IsGranted('ROLE_ADMIN')]
    public function createEntraineur(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(['ROLE_ENTRAINEUR']);
            $user->setPassword($hasher->hashPassword($user, $user->getPassword()));
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Entraîneur créé avec succès');
            return $this->redirectToRoute('home');
        }

        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
            'type' => 'entraineur',
        ]);
    }
}
