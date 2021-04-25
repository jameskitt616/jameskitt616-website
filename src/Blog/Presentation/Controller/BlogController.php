<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Domain\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BlogController extends AbstractController
{
    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * @return Response
     * @Route("/blog", name="blog_list")
     */
    public function show(): Response
    {
        $posts = $this->blogRepository->findAllPosts();

        return $this->render('blog/blog_list.html.twig', [
            'posts' => $posts,
        ]);
    }
}
