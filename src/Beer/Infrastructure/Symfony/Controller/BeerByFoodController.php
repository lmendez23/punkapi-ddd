<?php

namespace App\Beer\Infrastructure\Symfony\Controller;

use App\Beer\Application\BeersByFood;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class BeerByFoodController extends AbstractController
{
    /**
     * @throws Exception
     */
    #[Route('/api/beers', name: 'beers_by_food', methods: ['GET'])]
    public function __invoke(Request $request, BeersByFood $beersByFood): JsonResponse
    {
        $beers = $beersByFood($request);

        return $this->json([
            'beers' => $beers
        ]);
    }
}
