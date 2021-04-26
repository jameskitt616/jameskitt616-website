<?php

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\CreatePost;
use App\Blog\Application\Command\DeletePost;
use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\BlogRepository;

class DeletePostHandler
{
    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function __invoke(DeletePost $command)
    {
        $this->blogRepository->delete($command->post);
    }
}
