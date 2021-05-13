<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Application\Command\CreatePost;
use App\Blog\Application\Command\UpdatePost;
use App\Blog\Domain\Entity\Post;
use App\Blog\Presentation\Form\CreatePostForm;
use App\Blog\Presentation\Form\UpdatePostForm;
use App\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
final class UpdatePostController extends AbstractController
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
     * @Route("/blog/update/post/{post}", name="update_blog_post", methods={"POST", "GET"})
     */
    public function createPost(Request $request, Post $post): Response
    {
        $command = new UpdatePost($post);

        $url = $this->generateUrl('update_blog_post', [
            'post' => $post->getId(),
        ]);
        $form = $this->createForm(UpdatePostForm::class, $command, ['action' => $url]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->commandBus->handle($form->getData());

            return $this->redirectToRoute('blog_post',[
                'slug' => $post->getSlug(),
            ]);
        }

        return $this->render('blog/form/update_post_form.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);
    }
}
