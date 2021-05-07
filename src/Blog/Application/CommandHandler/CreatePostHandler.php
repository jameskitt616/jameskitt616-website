<?php

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\CreatePost;
use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\PostRepository;

class CreatePostHandler
{
    private PostRepository $blogRepository;

    public function __construct(PostRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function __invoke(CreatePost $command)
    {
        $post = new Post($command->title, $command->url);

        $this->blogRepository->save($post);
    }
}
