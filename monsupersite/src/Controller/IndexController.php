<?php

namespace App\Controller;
use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(AlbumRepository $albumRepository): Response
    {
        return $this->render('index/home.html.twig', [
            'album' => $albumRepository->top(Album::NB_TOP),
        ]);
    }
}
