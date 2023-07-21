<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\UuidV7;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`users`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: Types::GUID, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private UuidV7 $id;

    #[ORM\Column(type: Types::STRING)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $name;

    #[ORM\Column(type: Types::STRING)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $surname;

    #[ORM\Column(type: Types::STRING)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $nickname;

    #[ORM\Column(type: Types::STRING)]
    #[Assert\Email]
    private ?string $email;

    #[ORM\Column(type: Types::STRING)]
    #[Assert\NotBlank]
    private string $password;

    #[ORM\Column(type: Types::STRING)]
    #[Assert\NotBlank]
    private string $salt;

    /** Fields */
    public const NAME = 'name';
    public const SURNAME = 'surname';
    public const NICKNAME = 'nickname';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';

    public const SALT_LENGTH = 10;

    public function getId(): UuidV7
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    // Реализую позже

    public function getUserIdentifier(): string
    {
        return '';
    }

    public function getUsername(): void
    {
        return;
    }

    public function getPassword(): ?string
    {
        return null;
    }

    public function getRoles(): array
    {
        return [];
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function eraseCredentials(): void
    {
        return;
    }
}
