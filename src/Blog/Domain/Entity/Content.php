<?php

declare(strict_types = 1);

namespace App\Blog\Domain\Entity;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity()
 */
abstract class Content
{
    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="string")
     */
    private string $id;

    /**
     * @var Post $post
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="content", cascade={"persist"})
     */
    private Post $post;

    public function __construct(Post $post)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->post = $post;
    }
}
