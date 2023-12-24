<?php

namespace App\Tests\Unit\src\Beer\Application;

use App\Beer\Application\BeersByFood;
use App\Beer\Infrastructure\Repository\BeerRepository;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class BeerByFoodTest extends TestCase
{
    /**
     * @throws \Exception|Exception
     */
    public function test_should_find_a_beer_by_food(): void
    {
        $repository = $this->createMock(BeerRepository::class);
        $beerByFood = new BeersByFood($repository);

        $request = new Request([
            'food' => 'any_food',
            'page' => 1,
            'per_page' => 10
        ]);

        $repository->expects($this->once())->method('findByFood')->with(
            $request->query->get('food'),
            $request->query->get('page'),
            $request->query->get('per_page')
        );
        $beerByFood($request);
    }
}
