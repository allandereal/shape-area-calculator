<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ShapeController extends AbstractController
{
    #[Route('/circle/{radius}', name: 'circle', methods: ['GET', 'HEAD'])]
    public function circle($radius, ValidatorInterface $validator): JsonResponse
    {
        //Validation
        $constraints = new Assert\Collection([
            'radius' => [new Assert\Type('numeric')]
        ]);

        $errors = $validator->validate([
            'radius' => $radius,
        ], $constraints);

        if (count($errors) > 0) {
            return $this->json(['errors' => (string) $errors], 422);
        }

        return $this->json(
            new Circle($radius)
        );
    }

    #[Route('/triangle/{a}/{b}/{c}', name: 'triangle', methods: ['GET', 'HEAD'])]
    public function triangle($a, $b, $c, ValidatorInterface $validator): mixed
    {
        //Validation
        $constraints = new Assert\Collection([
            'a' => [new Assert\Type('numeric')],
            'b' => [new Assert\Type('numeric')],
            'c' => [new Assert\Type('numeric')],
        ]);

        $errors = $validator->validate(
            ['a' => $a, 'b' => $b, 'c' => $c],
            $constraints
        );

        if (count($errors) > 0) {
            return $this->json(['errors' => (string) $errors], 422);
        }

        //check if ita a valid triangle (The sum of 2 sides should be greater than the remaining side)
        if (!(($a + $b) > $c
            && ($a + $c) > $b
            && ($b + $c) > $a)
        ) {
            return $this->json(['errors' => 'The provided sides do not make a valid triangle!'], 422);
        }

        return $this->json(
            new Triangle($a, $b, $c)
        );
    }
}
