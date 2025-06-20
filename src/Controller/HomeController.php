<?php

namespace App\Controller;

use App\Repository\JoueurRepository;
use App\Repository\EntraineurRepository;
use App\Repository\RencontreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(
        JoueurRepository $joueurRepository,
        EntraineurRepository $entraineurRepository,
        RencontreRepository $rencontreRepository
    ): Response
    {
        // Récupération des statistiques
        $nbJoueurs = $joueurRepository->count([]);
        $nbEntraineurs = $entraineurRepository->count([]);
        $nbRencontres = $rencontreRepository->count([]);

        return $this->render('home/index.html.twig', [
            'nb_joueurs' => $nbJoueurs,
            'nb_entraineurs' => $nbEntraineurs,
            'nb_rencontres' => $nbRencontres,
        ]);
    }
}