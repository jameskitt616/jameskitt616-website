<?php

namespace App\Security\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity()
 */
class User implements UserInterface
{
    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="string", length=40)
     */
    private string $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private string $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getRoles(): array
    {
        return [];
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getSalt(): void
    {
        // we`re using bcrypt
    }

    public function eraseCredentials(): void
    {
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function updateCredentials(string $email, string $password): void
    {
        $this->email = $email;
        $this->password = $password;
    }
}
