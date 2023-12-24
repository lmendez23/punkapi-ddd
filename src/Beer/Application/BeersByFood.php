<?php

namespace App\Beer\Application;

use App\Beer\Infrastructure\Repository\BeerRepository;
use Symfony\Component\HttpFoundation\Request;

class BeersByFood
{
    public $repository;
    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function __invoke(Request $request): array
    {
        return $this->repository->findByFood(
            $request->query->get('food'),
            $request->query->get('page'),
            $request->query->get('per_page')
        );
    }
}
