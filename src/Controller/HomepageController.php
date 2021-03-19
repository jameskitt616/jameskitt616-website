<?php

declare(strict_types = 1);

namespace App\Controller;

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
        return $this->render('base.html.twig');
    }
}