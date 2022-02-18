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
     * @ORM\Id()
     * @ORM\Column(type="string")
     */
    private string $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;

    /**
     * @var PersistentCollection|Content[]
     * @ORM\OneToMany(targetEntity="Content", mappedBy="post", cascade={"persist"})
     * @ORM\OrderBy({"createdAt" = "ASC"})
     */
    private PersistentCollection $contents;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $publishedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $url;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $deletedAt;

    public function __construct(string $title, string $url)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->title = $title;
        $this->createdAt = new DateTime();
        $this->publishedAt = null;
        $this->deletedAt = null;
        $this->url = $url;
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

    public function getPublishedAt(): ?DateTime
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

    public function delete(): void
    {
        $this->deletedAt = new DateTime();
    }

    public function getContents(): array
    {
        /** @var Content[] */
        return $this->contents->toArray();
    }
}
