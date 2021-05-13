<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Application\Command\DeleteContent;
use App\Blog\Domain\Entity\Post;
use App\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
final class DeleteContentController extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Post   $post
     * @param string $contentId
     *
     * @return Response
     * @Route("/{post}/delete/content/{contentId}", name="post_delete_content", methods={"GET"})
     */
    public function deleteContent(Post $post, string $contentId): Response
    {
        $command = new DeleteContent($contentId);
        $this->commandBus->handle($command);

        return $this->redirectToRoute('blog_post', [
            'slug' => $post->getSlug(),
        ]);
    }
}
