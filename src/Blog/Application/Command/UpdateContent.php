<?php

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Content;
use App\Command;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UpdateContent implements Command
{
    /**
     * @var Content $content
     */
    public Content $content;

    /**
     * @var string|null
     */
    public ?string $title = null;

    /**
     * @var string|null
     */
    public ?string $text = null;

    /**
     * @var UploadedFile|null
     */
    public ?UploadedFile $imageFile = null;

    public function __construct(Content $content)
    {
        $this->content = $content;
        $this->title = $content->getTitle();
        $this->text = $content->getText();
    }

    /**
     * @return string
     */
    public function getData(): ?string
    {
        if ($this->imageFile !== null) {
            $stream = fopen($this->imageFile->getRealPath(), 'rb');

            return base64_encode(stream_get_contents($stream));
        }

        return null;
    }
}
