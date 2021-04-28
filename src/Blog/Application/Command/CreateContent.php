<?php

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Post;
use App\Command;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CreateContent implements Command
{
    /**
     * @var Post $post
     */
    public Post $post;

    /**
     * @var string|null
     */
    public ?string $text = null;

    /**
     * @var string|null
     */
    public ?string $title = null;

    /**
     * @var UploadedFile|null
     */
    public ?UploadedFile $imageFile = null;

    public function __construct(Post $post)
    {
        $this->post = $post;
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
