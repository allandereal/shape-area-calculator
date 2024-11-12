<?php

namespace App\Entity;

class Circle extends Shape
{
    protected string $type = 'circle';

    public function __construct(public float $radius)
    {
        $this->calculateSurface();
        $this->circumference = round(pi() * $this->calculateDiameter(), 2);
    }

    function calculateSurface(): void
    {
        $this->surface = round(
            pi() * pow($this->radius, 2),
            2
        );
    }

    function calculateDiameter(): float
    {
        return $this->radius * 2;
    }
}
