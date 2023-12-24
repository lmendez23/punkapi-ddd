<?php

namespace App\Beer\Application;

use App\Beer\Domain\Model\Beer;
use App\Beer\Infrastructure\Repository\Guzzle\PunkApiRepository;

class BeersById
{
    public PunkApiRepository $repository;
    public function __construct(PunkApiRepository $repository)
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
