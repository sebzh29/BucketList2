<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        $appTitle = 'Bucket List';

        return $this->render('main/index.html.twig', [
            'app_title' => $appTitle,
        ]);
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        $appTitle = 'Bucket List';

        return $this->render('main/aboutus.html.twig', [
            'app_title' => $appTitle,
        ]);
    }
}
