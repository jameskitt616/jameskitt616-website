<?php

declare(strict_types=1);

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\ToggleVisibilityPost;
use App\Blog\Domain\Repository\PostRepository;

class TogglePostVisibilityHandler
{
    private PostRepository $blogRepository;

    public function __construct(PostRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function __invoke(ToggleVisibilityPost $command)
    {
        $post = $command->post;
        $post->setPublishedAt($command->visibility);

        $this->blogRepository->save($post);
    }
}
