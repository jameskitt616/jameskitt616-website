<?php

declare(strict_types=1);

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\UpdatePost;
use App\Blog\Domain\Repository\PostRepository;

class UpdatePostHandler
{
    private PostRepository $blogRepository;

    public function __construct(PostRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function __invoke(UpdatePost $command)
    {
        $post = $command->post;

        $post->setTitle($command->title);
        $post->setSlug($command->url);

        $this->blogRepository->save($post);
    }
}
