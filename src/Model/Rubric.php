<?php

declare(strict_types=1);

namespace App\Model;

class Rubric implements \JsonSerializable
{
    public int $id;

    private Firm $firm;

    private string $name;

    private int $parentId = 0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getFirm(): Firm
    {
        return $this->firm;
    }

    public function setFirm(Firm $firm): self
    {
        $this->firm = $firm;
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

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): self
    {
        $this->parentId = $parentId;
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
