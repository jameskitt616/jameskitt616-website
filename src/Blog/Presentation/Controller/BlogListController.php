<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Domain\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BlogListController extends AbstractController
{
    private PostRepository $blogRepository;

    public function __construct(PostRepository $blogRepository)
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

        return $this->render('blog/post_list.html.twig', [
            'posts' => $posts,
        ]);
    }
}
