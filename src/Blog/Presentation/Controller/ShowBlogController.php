<?php

declare(strict_types=1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Domain\Repository\ContentRepository;
use App\Blog\Domain\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ShowBlogController extends AbstractController
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    #[Route(path: '/blog/{slug}', name: 'blog_post')]
    public function show(string $slug): Response
    {
        $post = $this->postRepository->findPostBySlug($slug);
        if ($post === null) {
            return $this->redirectToRoute('blog_list');
        }

        return $this->render('blog/show_post.html.twig', [
            'post' => $post,
        ]);
    }
}
