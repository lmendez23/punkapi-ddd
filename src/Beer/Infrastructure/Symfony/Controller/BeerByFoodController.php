<?php

namespace App\Beer\Infrastructure\Symfony\Controller;

use App\Beer\Infrastructure\Repository\Guzzle\PunkApiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BeerByFoodController extends AbstractController
{
    protected PunkApiRepository $repository;

    public function __construct()
    {
        $this->repository = new PunkApiRepository();
    }

    public function __invoke(Request $request): JsonResponse
    {
        $beers = $this->repository->findByFood(
            $request->query->get('food'),
            $request->query->get('page'),
            $request->query->get('per_page')
        );

        return $this->json([
            'beers' => $beers
        ]);
    }
}
