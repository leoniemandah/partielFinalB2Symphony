<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist")
     */
    public function index(ArtistRepository $repo): Response
    {
        $artist = $repo->findAll();
        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
            'artist' => $artist
        ]);
    }

    /**
     * @Route("/artist/{id}", name="show")
     */
    public function show(Artist $artist)
    {
    
        return $this->render('artist/show_artist.html.twig', ['artist' => $artist]);
    }
}
