<?php

namespace App\Beer\Application;

use App\Beer\Domain\Model\Beer;
use App\Beer\Infrastructure\Repository\BeerRepository;

class BeersById
{
    public $repository;
    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function __invoke($id): ?Beer
    {
        return $this->repository->findById($id);
    }
}
