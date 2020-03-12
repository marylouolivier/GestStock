<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FournisseursRepository;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(FournisseursRepository $fournisseursRepository)
    {
        // Récupération des fournisseurs
        $fournisseurs=$fournisseursRepository->findAll();

        return $this->render('articles/index.html.twig', [
            'controller_name' => 'ArticlesController',
            'fournisseurs' => $fournisseurs,
        ]);
    }
}
