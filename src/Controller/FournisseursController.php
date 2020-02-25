<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FournisseursController extends AbstractController
{
    /**
     * @Route("/fournisseurs", name="fournisseurs")
     */
    public function index()
    {
        return $this->render('fournisseurs/index.html.twig', [
            'controller_name' => 'FournisseursController',
        ]);
    }
}
