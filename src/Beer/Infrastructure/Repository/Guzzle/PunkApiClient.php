<?php

namespace App\Beer\Infrastructure\Repository\Guzzle;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use RuntimeException;

class PunkApiClient
{
    protected Client $client;

    protected const BASE_URI = 'https://api.punkapi.com/v2/';
    protected const PER_PAGE_LIMIT = 10;
    public function __construct()
    {
        $this->client = new Client();
    }

    private function queryParams(?string $food, ?int $page = 1, ?int $perPage = self::PER_PAGE_LIMIT): string
    {
        $params = [];
        $params['page'] = $page;
        $params['per_page'] = $perPage;
        $food && $params['food'] = str_replace(' ', '_', $food);
        return http_build_query($params);
    }

    /**
     * @throws GuzzleException | JsonException
     */
    public function searchBeers(?string $food, ?int $page, ?int $perPage): array
    {
        $uri = static::BASE_URI . 'beers?' . $this->queryParams($page, $perPage, $food);
        try {
            $response = $this->client->request('GET', $uri);
        } catch (ConnectException $e) {
            throw new RuntimeException($e->getMessage());
        }
        return json_decode($response->getBody(), false, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws GuzzleException | Exception
     */
    public function findBeerById(int $beerId)
    {
        $uri = static::BASE_URI . 'beers/' . $beerId;
        try {
            $response = $this->client->request('GET', $uri);
        } catch (ConnectException $e) {
            throw new RuntimeException($e->getMessage());
        }
        return json_decode($response->getBody(), false, 512, JSON_THROW_ON_ERROR);
    }
}
