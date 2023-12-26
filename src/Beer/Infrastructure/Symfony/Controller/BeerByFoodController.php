<?php

namespace App\Beer\Infrastructure\Symfony\Controller;

use App\Beer\Application\BeersByFood;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;

class BeerByFoodController extends AbstractController
{
    /**
     * @throws Exception
     */
    #[OA\Get(
        path: '/api/beers',
        summary: 'Get a paginated list of beers and/or filtered by food string',
        tags: ['Beers']
    )]
    #[OA\Parameter(
        name: 'food',
        description: 'food filter (3 characters min)',
        in: 'query',
        schema: new OA\Schema(type: 'string')
    )]
    #[OA\Parameter(
        name: 'page',
        description: 'page number',
        in: 'query',
        schema: new OA\Schema(type: 'integer')
    )]
    #[OA\Parameter(
        name: 'per_page',
        description: 'number of elements for each page',
        in: 'query',
        schema: new OA\Schema(type: 'integer')
    )]
    #[OA\Response(
        response: 200,
        description: 'Returns the beer detail',
    )]
    #[Route('/api/beers', name: 'beers_by_food', methods: ['GET'])]
    public function __invoke(Request $request, BeersByFood $beersByFood): JsonResponse
    {
        $beers = $beersByFood($request);

        return $this->json([
            'beers' => $beers
        ]);
    }
}
