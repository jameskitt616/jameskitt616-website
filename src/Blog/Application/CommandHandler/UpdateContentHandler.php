<?php

declare(strict_types=1);

namespace App\Blog\Application\CommandHandler;

use App\Blog\Application\Command\UpdateContent;
use App\Blog\Domain\Repository\ContentRepository;

class UpdateContentHandler
{
    private ContentRepository $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function __invoke(UpdateContent $command)
    {
        $content = $command->content;

        $content->setTitle($command->title);
        $content->setText($command->text);
        if (!empty($command->imageFile)) {
            $content->setImage($command->getData());
        } else {
            if ($command->removePicture) {
                $content->setImage(null);
            }
        }

        $this->contentRepository->save($content);
    }
}
