<?php

declare(strict_types = 1);

namespace App\Blog\Domain\Entity;

use DateTime;
use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
final class Post
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
    private DateTime $creationDate;

    public function __construct(string $title)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->title = $title;
        $this->creationDate = new DateTime();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }
}
