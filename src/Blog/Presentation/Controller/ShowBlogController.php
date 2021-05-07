<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Domain\Repository\ContentRepository;
use App\Blog\Domain\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ShowBlogController extends AbstractController
{
    private ContentRepository $contentRepository;

    private PostRepository $postRepository;

    public function __construct(ContentRepository $contentRepository, PostRepository $postRepository)
    {
        $this->contentRepository = $contentRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * @param string $slug
     *
     * @return Response
     * @Route("/blog/post/{slug}", name="blog_post")
     */
    public function show(string $slug): Response
    {
        $post = $this->postRepository->findPostBySlug($slug);
        $contents = $this->contentRepository->findContentsByPostId($post->getId());

        return $this->render('blog/show_post.html.twig', [
            'post' => $post,
            'contents' => $contents,
        ]);
    }
}
