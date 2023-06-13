<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/wish', name: 'app_')]
class WishController extends AbstractController
{
    private  $wishes = [
        "1" => "ski",
        "2" => "snow",
        "3" => "surf",

    ];
    #[Route('/', name: 'list')]
    public function list(): Response
    {
        return $this->render('main/list.html.twig', [
            'wishes' => $this->wishes
        ]);
    }

    /**
     * @param $id
     * @return Response
     */
    #[Route('/{id}',
        name: 'details',
        requirements:  ["id" => "\d+"],
        methods: ["GET"]
    )]
    public function details($id): Response
    {

        $arrayKeys = array_keys($this->wishes);
        if(!in_array($id, $arrayKeys)) {
            $wish = null;
        } else {
            $wish = $this->wishes[$id];
        }

        return $this->render('main/wishDetail.html.twig', [
            'wish' => $wish,
        ]);
    }
}
