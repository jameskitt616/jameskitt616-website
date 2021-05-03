<?php

declare(strict_types = 1);

namespace App\Contact\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ContactController extends AbstractController
{
    /**
     * @return Response
     * @Route("/contact", name="contact")
     */
    public function show(): Response
    {
        return $this->render('contact/contact.html.twig');
    }
}
