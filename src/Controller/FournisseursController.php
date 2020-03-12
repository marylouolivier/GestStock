<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FournisseursRepository;

class FournisseursController extends AbstractController
{
    /**
     * @Route("/fournisseurs", name="fournisseurs")
     */
    public function index(FournisseursRepository $fournisseursRepository)
    {   
        $fournisseurs=$fournisseursRepository->findAll();
        return $this->render('fournisseurs/index.html.twig', [
            'controller_name' => 'FournisseursController',
            'fournisseurs'=> $fournisseurs,
        ]);
    }
}
