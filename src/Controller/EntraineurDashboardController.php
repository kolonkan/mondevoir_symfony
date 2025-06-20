<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EntraineurDashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_entraineur_dashboard')]
    public function index(): Response
    {
        return $this->render('app_entraineur_dashboard/index.html.twig', [
            'controller_name' => 'EntraineurDashboardController',
        ]);
    }
}
