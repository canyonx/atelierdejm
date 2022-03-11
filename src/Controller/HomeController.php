<?php

namespace App\Controller;

use App\Repository\FeaturetteRepository;
use App\Repository\HeaderRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(
        HeaderRepository $headerRepository,
        ProductRepository $productRepository,
        FeaturetteRepository $featuretteRepository
    ): Response {

        return $this->render('home/index.html.twig', [
            'headers' => $headerRepository->findByIsShow(true, [], 3),
            'products' => $productRepository->findByIsBest(true, [], 3),
            'featurettes' => $featuretteRepository->findByIsShow(true, [], 3)
        ]);
    }
}
