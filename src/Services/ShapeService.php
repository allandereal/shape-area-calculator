<?php

namespace App\Services;

use App\Entity\Circle;
use App\Entity\Shape;

class ShapeService
{
    public function areaSum(Shape ...$shapes): float
    {
        $totalArea = 0.0;

        foreach ($shapes as $shape) {
            $totalArea += $shape->getArea();
        }

        return $totalArea;
    }

    public function diameterSum(Circle ...$circles): float
    {
        $totalDiameter = 0.0;

        foreach ($circles as $circle) {
            $totalDiameter += $circle->calculateDiameter();
        }

        return $totalDiameter;
    }
}