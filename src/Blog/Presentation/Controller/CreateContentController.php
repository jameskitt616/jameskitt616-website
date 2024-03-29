<?php

declare(strict_types=1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Application\Command\CreateContent;
use App\Blog\Domain\Entity\Post;
use App\Blog\Presentation\Form\CreateContentForm;
use App\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin')]
final class CreateContentController extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    #[Route(path: '/{post}/create/content', name: 'post_create_content', methods: ['POST', 'GET'])]
    public function createContent(Request $request, Post $post): Response
    {
        $command = new CreateContent($post);
        $url = $this->generateUrl('post_create_content', [
            'post' => $post->getId(),
        ]);

        $form = $this->createForm(CreateContentForm::class, $command, [
            'action' => $url,
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->commandBus->handle($form->getData());

            return $this->redirectToRoute('blog_post', [
                'slug' => $post->getSlug(),
            ]);
        }

        return $this->render('blog/form/create_content_form.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);
    }
}
