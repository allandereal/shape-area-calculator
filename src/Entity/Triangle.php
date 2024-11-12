<?php

namespace App\Entity;

class Triangle extends Shape
{
    protected string $type = 'triangle';

    public function __construct(public float $a, public float $b, public float $c)
    {
        $this->calculateSurface();
        $this->circumference = round($this->a + $this->b + $this->c, 2);
    }

    function calculateSurface(): void
    {
        $semiArea = ($this->a + $this->b + $this->c) / 2.0;

        $this->surface = round(
            sqrt($semiArea * ($semiArea - $this->a) * ($semiArea - $this->b) * ($semiArea - $this->c)),
            2
        );
    }
}
