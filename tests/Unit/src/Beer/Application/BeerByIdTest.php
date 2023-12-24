<?php

namespace App\Tests\Unit\src\Beer\Application;

use App\Beer\Application\BeersById;
use App\Beer\Infrastructure\Repository\BeerRepository;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class BeerByIdTest extends TestCase
{
    /**
     * @throws \Exception|Exception
     */
    public function test_should_find_a_beer_by_id(): void
    {
        $repository = $this->createMock(BeerRepository::class);
        $beerById = new BeersById($repository);

        $repository->expects($this->once())->method('findById')->with(1);
        $beerById(1);
    }
}
