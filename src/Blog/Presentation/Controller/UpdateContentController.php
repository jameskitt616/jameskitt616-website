<?php

declare(strict_types = 1);

namespace App\Blog\Presentation\Controller;

use App\Blog\Application\Command\CreateContent;
use App\Blog\Application\Command\UpdateContent;
use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\ContentRepository;
use App\Blog\Presentation\Form\CreateContentForm;
use App\Blog\Presentation\Form\UpdateContentForm;
use App\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
final class UpdateContentController extends AbstractController
{
    private CommandBus $commandBus;

    private ContentRepository $contentRepository;

    public function __construct(CommandBus $commandBus, ContentRepository $contentRepository)
    {
        $this->commandBus = $commandBus;
        $this->contentRepository = $contentRepository;
    }

    /**
     * @param Request $request
     * @param Post    $postId
     * @param string  $contentId
     *
     * @return Response
     * @Route("/{postId}/update/content/{contentId}", name="post_update_content", methods={"POST", "GET"})
     */
    public function updateContent(Request $request, Post $postId, string $contentId): Response
    {
        $content = $this->contentRepository->findContentsById($contentId);
        $command = new UpdateContent($content);

        $url = $this->generateUrl('post_update_content', [
            'postId' => $postId->getId(),
            'contentId' => $contentId,
        ]);
        $form = $this->createForm(UpdateContentForm::class, $command, ['action' => $url]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->commandBus->handle($form->getData());

            return $this->redirectToRoute('blog_post', [
                'id' => $postId->getId(),
            ]);
        }

        return $this->render('blog/form/update_content_form.html.twig', [
            'form' => $form->createView(),
            'post' => $postId,
        ]);
    }
}
