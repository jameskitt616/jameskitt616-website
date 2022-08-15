<?php

declare(strict_types=1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Application\Command\CreatePost;
use App\Blog\Presentation\Form\CreatePostForm;
use App\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin')]
final class CreatePostController extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    #[Route(path: '/blog/create/post', name: 'create_blog_post', methods: ['POST', 'GET'])]
    public function createPost(Request $request): Response
    {
        $command = new CreatePost();
        $url = $this->generateUrl('create_blog_post');
        $form = $this->createForm(CreatePostForm::class, $command, [
            'action' => $url,
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->commandBus->handle($form->getData());

            return $this->redirectToRoute('blog_list');
        }

        return $this->render('blog/form/create_post_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
