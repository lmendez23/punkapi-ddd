<?php

namespace App\Beer\Infrastructure\Symfony\Controller;

use App\Beer\Application\BeersById;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BeerByIdController extends AbstractController
{
    /**
     * @throws Exception
     */
    public function __invoke(Request $request, BeersById $beersById, $id): JsonResponse
    {
        $beer = $beersById($id);

        if (!$beer) {
            throw new NotFoundHttpException('Beer not found');
        }

        return $this->json($beer);
    }
}
