<?php

namespace App\Beer\Infrastructure\Symfony\Controller;

use App\Beer\Application\BeersByFood;
use App\Beer\Infrastructure\Repository\Guzzle\PunkApiRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BeerByFoodController extends AbstractController
{
    /**
     * @throws Exception
     */
    public function __invoke(Request $request, BeersByFood $beersByFood): JsonResponse
    {
        $beers = $beersByFood($request);

        return $this->json([
            'beers' => $beers
        ]);
    }
}
