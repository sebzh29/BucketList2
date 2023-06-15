<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function list(WishRepository $wishRepository): Response
    {
        $wishes = $wishRepository->findAll();
        $wishesCount = $wishRepository->count([]);
            dump($wishes);
        return $this->render('wish/list.html.twig', [
            'wishes' => $wishes,
            'wishesCount' => $wishesCount
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
    public function details($id, WishRepository $wishRepository): Response
    {
        $wish = $wishRepository->find($id);

        return $this->render('wish/wishDetail.html.twig', [
            'wish' => $wish,
        ]);
    }

    #[route('/create', name: 'create')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        $wish = new Wish();
        $wish->setTitle("Faire du perl");
        $wish->setDescription("gkjdfjdhsdjkfksdhfsdfjkshjlll");
        $wish->setAuthor('Moi');
        $wish->setIsPublished("1");
        $date = new \DateTime();
        $wish->setDateCreated($date);

        dump($wish);

        $entityManager->persist($wish);

        $entityManager->flush();

        return $this->render('wish/create.html.twig', [
            'wish' => $wish
        ]);
    }
    #[route('/recentWish', name: 'recent_wish')]
    public function recentWish(WishRepository $wishRepository )
    {
        $wishes = $wishRepository->findByRecentDate();
        dump($wishes);
        return $this->render('wish/recentWish.html.twig', [
            'wishes' => $wishes
        ]);
    }
}
//        foreach ($this->wishes as  $wish) {
//            $wishEntity = new Wish();
//            $wishEntity->setTitle($wish[0]);
//            $wishEntity->setDescription($wish[1]);
//            $wishEntity->setAuthor($wish[2]);
//            $wishEntity->setIsPublished();
//            $wishEntity->setDateCreated(new  \DateTime());
//
//            $entityManager->persist($wishEntity);
//        }
//        $entityManager->flush();