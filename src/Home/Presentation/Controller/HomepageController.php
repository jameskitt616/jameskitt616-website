<?php

declare(strict_types = 1);

namespace App\Home\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomepageController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="home")
     */
    public function show(): Response
    {
        return $this->render('home/home.html.twig');
    }

    /**
     * @return Response
     * @Route("/test", name="test")
     */
    public function test(): Response
    {
        return new Response('01100110 01101001 01101110 01100100 00100000 01100001 00100000 01101000 01101111 01100010 01100010 01111001 00100000 01100110 01101111 01110010 00100000 01100111 01101111 01100100 00100111 01110011 00100000 01110011 01100001 01101011 01100101', 200);
    }
}
