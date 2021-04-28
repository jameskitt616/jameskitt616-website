<?php

declare(strict_types = 1);

namespace App\Blog\Domain\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity()
 */
class Content
{
    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="string")
     */
    private string $id;

    /**
     * @var Post $post
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="contents", cascade={"all"})
     */
    private Post $post;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $title;

    /**
     * @var string|null
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $text;

    /**
     * @var string|null
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $image;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;

    public function __construct(Post $post)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->post = $post;
        $this->createdAt = new DateTime();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title === null ? '' : $title;
    }
}
