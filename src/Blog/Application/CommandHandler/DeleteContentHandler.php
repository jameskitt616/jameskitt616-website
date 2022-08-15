<?php

declare(strict_types=1);

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\DeleteContent;
use App\Blog\Domain\Repository\ContentRepository;

class DeleteContentHandler
{
    private ContentRepository $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function __invoke(DeleteContent $command)
    {
        $content = $this->contentRepository->findContentsById($command->contentId);
        $this->contentRepository->delete($content);
    }
}
