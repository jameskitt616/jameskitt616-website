<?php

declare(strict_types=1);

namespace App\Home\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ShowController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function show(): Response
    {
        return $this->render('home/home.html.twig');
    }
}
