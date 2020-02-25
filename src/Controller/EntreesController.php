<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EntreesController extends AbstractController
{
    /**
     * @Route("/entrees", name="entrees")
     */
    public function index()
    {
        return $this->render('entrees/index.html.twig', [
            'controller_name' => 'EntreesController',
        ]);
    }
}
