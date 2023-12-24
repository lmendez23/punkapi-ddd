<?php

namespace App\Tests\Unit\src\Beer\Infrastructure\Repository\Guzzle;

use App\Beer\Domain\Model\Beer;
use App\Beer\Infrastructure\Repository\Guzzle\PunkApiRepository;
use PHPUnit\Framework\TestCase;

class PunkApiRepositoryTest extends TestCase
{
    private PunkApiRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = new PunkApiRepository();
    }

    public function test_should_return_array_of_beers_if_no_food(): void
    {
        $beers = $this->repository->findByFood(null, 1, 10);

        $this->assertCount(10, $beers);

        $this->assertIsArray($beers);
        $this->assertInstanceOf(Beer::class, $beers[0]);
    }

    public function test_should_return_array_of_beers_if_food(): void
    {
        $beers = $this->repository->findByFood('food', 1, 2);

        $this->assertCount(2, $beers);

        $this->assertIsArray($beers);
        $this->assertInstanceOf(Beer::class, $beers[0]);
    }

    public function test_should_return_empty_array_if_no_food_found(): void
    {
        $beers = $this->repository->findByFood('unknown-food', 1, 10);

        $this->assertCount(0, $beers);

        $this->assertIsArray($beers);
    }

    public function test_should_return_beer_if_id_found(): void
    {
        $beer = $this->repository->findById(1);

        $this->assertInstanceOf(Beer::class, $beer);
    }

    public function test_should_return_null_if_id_not_found(): void
    {
        $beer = $this->repository->findById(0);
        $this->assertNull($beer);
    }
}

