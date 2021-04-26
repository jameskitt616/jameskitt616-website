<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Application\Command\DeletePost;
use App\Blog\Domain\Entity\Post;
use App\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DeletePostController extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Post $post
     *
     * @return Response
     * @Route("/blog/delete/{id}", name="blog_delete_post", methods={"GET"})
     */
    public function deletePost(Post $post): Response
    {
        $command = new DeletePost($post);
        $this->commandBus->handle($command);

        return $this->redirectToRoute('blog_list');
    }
}
