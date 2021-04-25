<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ShowBlogController extends AbstractController
{
    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * @return Response
     * @Route("/blog/post/{id}", name="blog_post")
     */
    public function show(Request $request, Post $post): Response
    {
//        $posts = $this->blogRepository->findAllPosts();

        return $this->render('blog/show_blog.html.twig', [
            'post' => $post,
        ]);
    }
}
