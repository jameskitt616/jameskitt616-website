<?php

declare(strict_types = 1);

namespace App\LandingPage\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class ShowLangingPageController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="landing_page")
     */
    public function showLandingPage(): Response
    {
        return $this->render('base.html.twig');
    }
}
