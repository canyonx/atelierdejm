<?php

namespace App\Controller;

use App\Repository\TermRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TermController extends AbstractController
{
    /**
     * @Route("/cgv", name="term")
     */
    public function index(
        TermRepository $termRepository
    ): Response {
        return $this->render('term/index.html.twig', [
            'terms' => $termRepository->findAll()
        ]);
    }
}
