<?php

namespace App\Beer\Application;

use App\Beer\Domain\Model\Beer;
use App\Beer\Infrastructure\Repository\Guzzle\PunkApiRepository;
use Symfony\Component\HttpFoundation\Request;

class BeersByFood
{
    public PunkApiRepository $repository;
    public function __construct(PunkApiRepository $repository)
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
