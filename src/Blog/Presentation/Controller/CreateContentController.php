<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Application\Command\CreateContent;
use App\Blog\Domain\Entity\Post;
use App\Blog\Presentation\Form\CreatePostForm;
use App\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CreateContentController extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Request $request
     * @param Post    $post
     *
     * @return Response
     * @Route("/{id}/create/post", name="post_create_content", methods={"POST", "GET"})
     */
    public function createContent(Request $request, Post $post): Response
    {
        $command = new CreateContent();

        $url = $this->generateUrl('post_create_content');
        $form = $this->createForm(CreatePostForm::class, $command, ['action' => $url]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->commandBus->handle($form->getData());

            return $this->redirectToRoute('blog_post', [
                'id' => $post->getId(),
            ]);
        }

        return $this->render('blog/form/create_content_form.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);
    }
}
