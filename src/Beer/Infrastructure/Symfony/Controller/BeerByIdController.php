<?php

namespace App\Beer\Infrastructure\Symfony\Controller;

use App\Beer\Infrastructure\Repository\Guzzle\PunkApiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BeerByIdController extends AbstractController
{
    protected PunkApiRepository $repository;

    public function __construct()
    {
        $this->repository = new PunkApiRepository();
    }

    public function __invoke(Request $request): JsonResponse
    {
        $beer = $this->repository->findById(
            $request->get('id')
        );

        return $this->json($beer);
    }
}
