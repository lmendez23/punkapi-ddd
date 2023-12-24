<?php

namespace App\Beer\Infrastructure\Repository\Guzzle;

use App\Beer\Domain\Model\Beer;
use App\Beer\Infrastructure\Repository\BeerRepository;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class PunkApiRepository implements BeerRepository
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

    private function makeCall(string $uri): ?array
    {
        try {
            $response = $this->client->request('GET', $uri);
            return json_decode($response->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception | GuzzleException $e) {
            return null;
        }
    }

    private function toBeer($beer): Beer
    {
        return new Beer(
            $beer->id,
            $beer->name,
            $beer->tagline,
            $beer->first_brewed,
            $beer->description,
            $beer->image_url
        );
    }

    private function toArrayOfBeers($beers): array
    {
        return array_map(fn ($beer) => $this->toBeer($beer), $beers);
    }

    /**
     * @throws JsonException
     */
    public function findByFood(?string $food, ?int $page, ?int $perPage): array
    {
        $response = $this->makeCall(static::BASE_URI . 'beers?' . $this->queryParams($food, $page, $perPage));

        return $this->toArrayOfBeers($response);
    }

    /**
     * @throws Exception
     */
    public function findById(int $id) : ?Beer
    {
        $response = $this->makeCall(static::BASE_URI . 'beers/' . $id);

        return $response ? $this->toBeer($response[0]) : null;
    }
}
