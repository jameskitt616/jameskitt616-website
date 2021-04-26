<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ShowBlogController extends AbstractController
{
    private ContentRepository $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    /**
     * @param Post $post
     *
     * @return Response
     * @Route("/blog/post/{id}", name="blog_post")
     */
    public function show(Post $post): Response
    {
        $contents = $this->contentRepository->findContentsByPostId($post->getId());

        return $this->render('blog/show_blog.html.twig', [
            'post' => $post,
            'contents' => $contents,
        ]);
    }
}
