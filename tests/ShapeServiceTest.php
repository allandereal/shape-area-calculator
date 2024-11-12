<?php

namespace App\Tests;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Services\ShapeService;
use PHPUnit\Framework\TestCase;

class ShapeServiceTest extends TestCase
{
    public function testCanSumUpCircleDiameters(): void
    {
        $circle1 = new Circle(2.5);
        $circle2 = new Circle(4.8);

        $this->assertEquals(
            (new ShapeService())->diameterSum($circle1, $circle2),
            $circle1->calculateDiameter() + $circle2->calculateDiameter()
        );
    }

    public function testCanSumUpShapeAreas(): void
    {
        $circle = new Circle(3.0);
        $triangle = new Triangle(4.2, 5, 6.1);

        $this->assertEquals(
            (new ShapeService())->areaSum($circle, $triangle),
            $circle->getArea() + $triangle->getArea()
        );
    }
}
