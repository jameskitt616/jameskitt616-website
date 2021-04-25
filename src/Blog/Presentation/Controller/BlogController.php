<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BlogController extends AbstractController
{
    /**
     * @return Response
     * @Route("/blog", name="blog_list")
     */
    public function show(): Response
    {
        $posts = ['asd', 'asdasdsadasd'];

        return $this->render('blog/blog_list.html.twig', [
            'posts' => $posts,
        ]);
    }
}
