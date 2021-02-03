<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use App\Repository\KnifeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ImageRepository $imageRepository, KnifeRepository $knifeRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'images' => $imageRepository->findAll(),
            'knives' => $knifeRepository->findAll(),
        ]);
    }
}
