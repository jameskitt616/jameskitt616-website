<?php

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\CreatePost;
use App\Blog\Application\Command\DeletePost;
use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\PostRepository;

class DeletePostHandler
{
    private PostRepository $blogRepository;

    public function __construct(PostRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function __invoke(DeletePost $command)
    {
        $post = $command->post;
        $post->delete();

        $this->blogRepository->save($post);
    }
}
