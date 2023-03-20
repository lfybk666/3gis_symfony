<?php

declare(strict_types=1);

namespace Model;

class Firm
{
    private Building $building;

    private Rubric $rubric;

    private string $name;

    public function getBuilding(): Building
    {
        return $this->building;
    }

    public function setBuilding(Building $building): self
    {
        $this->building = $building;
        return $this;
    }

    public function getRubric(): Rubric
    {
        return $this->rubric;
    }

    public function setRubric(Rubric $rubric): self
    {
        $this->rubric = $rubric;
        return $this;
    }
}
