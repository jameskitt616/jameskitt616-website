<?php

declare(strict_types=1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Application\Command\ToggleVisibilityPost;
use App\Blog\Domain\Entity\Post;
use App\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin')]
final class TogglePostVisibilityController extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    #[Route(path: '/{post}/toggle/{visibility}', name: 'post_toggle_visibility', methods: ['GET'])]
    public function togglePostVisibility(Post $post, bool $visibility): Response
    {
        $command = new ToggleVisibilityPost($post, $visibility);
        $this->commandBus->handle($command);

        return $this->redirectToRoute('blog_post', [
            'slug' => $post->getSlug(),
        ]);
    }
}
