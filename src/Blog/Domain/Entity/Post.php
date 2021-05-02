<?php

declare(strict_types = 1);

namespace App\Blog\Domain\Entity;

use DateTime;
use Doctrine\ORM\PersistentCollection;
use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Post
{
    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="string")
     */
    private string $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;

    /**
     * @var PersistentCollection|Content[]
     * @ORM\OneToMany(targetEntity="Content", mappedBy="post", cascade={"remove"})
     */
    private PersistentCollection $contents;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private bool $visible;

    public function __construct(string $title)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->title = $title;
        $this->createdAt = new DateTime();
        $this->visible = true;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function toggleVisibility(bool $visible): void
    {
        $this->visible = $visible;
    }

    public function isVisible(): bool
    {
        return $this->visible;
    }
}
