<?php

declare(strict_types=1);

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Content;
use App\Command;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UpdateContent implements Command
{
    public Content $content;
    public ?string $title = null;
    public ?string $text = null;
    public ?UploadedFile $imageFile = null;
    public bool $removePicture;

    public function __construct(Content $content)
    {
        $this->content = $content;
        $this->title = $content->getTitle();
        $this->text = $content->getText();
    }

    public function getData(): ?string
    {
        if ($this->imageFile !== null) {
            $stream = fopen($this->imageFile->getRealPath(), 'rb');

            return base64_encode(stream_get_contents($stream));
        }

        return null;
    }
}
