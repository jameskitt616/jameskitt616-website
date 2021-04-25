<?php

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\CreatePost;
use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\BlogRepository;

class CreatePostHandler
{
    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function __invoke(CreatePost $command)
    {
        $post = new Post($command->title);

        $this->blogRepository->save($post);
    }
}
