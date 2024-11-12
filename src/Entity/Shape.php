<?php

namespace App\Entity;

use JsonSerializable;

abstract class Shape implements JsonSerializable
{
    protected string $type = 'shape';
    protected ?float $surface = null;
    protected ?float $circumference = null;
    abstract function calculateSurface(): void;

    public function toJson(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT);
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    public function getArea(): float
    {
        return $this->surface;
    }
}