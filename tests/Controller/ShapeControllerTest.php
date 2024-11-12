<?php

namespace App\Tests\Controller;


use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Circle;
use App\Entity\Triangle;

class ShapeControllerTest extends ApiTestCase
{
    public function testCircleRouteReturnsCorrectData(): void
    {
        $radius = 2.1;

        $circle = new Circle($radius);

        $response = static::createClient()->request('GET', '/circle/'.$radius);

        $this->assertResponseIsSuccessful();

        $this->assertJsonContains($circle->toJson());
    }

    public function testCircleRouteOnlyAcceptsIntegerOrFloatRadius(): void
    {
        $radius = "string";

        $response = static::createClient()->request('GET', '/circle/'.$radius);

        $this->assertResponseStatusCodeSame(422);
    }

    public function testTriangleRouteReturnsCorrectData(): void
    {
        $a = 2.0;
        $b = 4.5;
        $c = 6.2;

        $triangle = new Triangle($a, $b, $c);

        $response = static::createClient()->request('GET', "/triangle/{$a}/{$b}/{$c}");

        $this->assertResponseIsSuccessful();

        $this->assertJsonContains($triangle->toJson());
    }

    public function testTriangleRouteReturnsValidationErrorWithInvalidTriangleSides(): void
    {
        $a = 2;
        $b = 4.5;
        $c = 7.8;

        $response = static::createClient()->request('GET', "/triangle/{$a}/{$b}/{$c}");

        $this->assertResponseStatusCodeSame(422);

        $this->assertJsonContains(['errors' => 'The provided sides do not make a valid triangle!']);
    }
}
