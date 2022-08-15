<?php

declare(strict_types=1);

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Post;
use App\Command;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CreateContent implements Command
{
    public Post $post;
    public ?string $text = null;
    public ?string $title = null;
    public ?UploadedFile $imageFile = null;

    public function __construct(Post $post)
    {
        $this->post = $post;
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
