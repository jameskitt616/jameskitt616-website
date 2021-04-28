<?php

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\CreateContent;
use App\Blog\Domain\Entity\Content;
use App\Blog\Domain\Repository\BlogRepository;
use App\Blog\Domain\Repository\ContentRepository;

class CreateContentHandler
{
    private ContentRepository $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function __invoke(CreateContent $command)
    {
        $content = new Content($command->post);
        $content->setText($command->text);

        $this->contentRepository->save($content);
    }
}
