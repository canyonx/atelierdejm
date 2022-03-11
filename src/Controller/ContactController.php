<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contact")
     */
    public function index(
        ContactRepository $contactRepository
    ): Response {
        $contacts = $contactRepository->findBy([], [], 6);

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
