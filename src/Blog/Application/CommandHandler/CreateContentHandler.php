<?php

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\CreateContent;
use App\Blog\Domain\Repository\BlogRepository;

class CreateContentHandler
{
    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function __invoke(CreateContent $command)
    {
        //        $post = new Post($command->title);
        //        $this->blogRepository->save($post);
    }
}
