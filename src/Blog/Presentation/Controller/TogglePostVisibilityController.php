<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Application\Command\ToggleVisibilityPost;
use App\Blog\Domain\Entity\Post;
use App\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
final class TogglePostVisibilityController extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Post    $postId
     * @param bool    $visibility
     *
     * @return Response
     * @Route("/{postId}/toggle/{visibility}", name="post_toggle_visibility", methods={"GET"})
     */
    public function togglePostVisibility(Post $postId, bool $visibility): Response
    {
        $command = new ToggleVisibilityPost($postId, $visibility);

        $this->commandBus->handle($command);

        return $this->redirectToRoute('blog_post', [
            'id' => $postId->getId(),
        ]);
    }
}
