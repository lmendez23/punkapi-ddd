<?php

namespace App\Beer\Infrastructure\Repository;

use App\Beer\Domain\Model\Beer;

interface BeerRepository
{
    public function findByFood(int $page, int $perPage, string $food): array;

    public function findById(int $id): ?Beer;
}
