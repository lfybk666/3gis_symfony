<?php

declare(strict_types=1);

namespace App\Model;

class User
{
    private int $id;

    private string $name;

    private string $email;

    private string $password;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    public function __sleep(): array
    {
        // TODO: Implement __sleep() method.
    }

    public function __wakeup(): void
    {
        // TODO: Implement __wakeup() method.
    }
}
