<?php

namespace App\Beer\Infrastructure\Repository;

use App\Beer\Domain\Model\Beer;

interface BeerRepository
{
    public function findByFood(?string $food, ?int $page, ?int $perPage): array;

    public function findById(int $id): ?Beer;
}
