<?php

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\CreatePost;
use App\Blog\Application\Command\DeletePost;
use App\Blog\Application\Command\ToggleVisibilityPost;
use App\Blog\Domain\Entity\Post;
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
        $post->toggleVisibility($command->visibility);

        $this->blogRepository->save($post);
    }
}
