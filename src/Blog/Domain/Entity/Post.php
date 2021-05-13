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
     * @var DateTime|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $publishedAt;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private string $url;

    public function __construct(string $title, string $url)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->title = $title;
        $this->createdAt = new DateTime();
        $this->publishedAt = null;
        $this->url = mb_substr($this->id, 0, 8) . '-' . $url;
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

    public function setPublishedAt(bool $publish): void
    {
        $this->publishedAt = $publish === true ? new DateTime() : null;
    }

    public function gotPublishedAt(): ?DateTime
    {
        return $this->publishedAt;
    }

    public function getSlug(): string
    {
        return $this->url;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setSlug(string $url): void
    {
        $this->url = $url;
    }
}
