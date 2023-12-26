<?php

namespace App\Tests\Behat;

use Behat\Behat\Context\Context;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

class BeersContext implements Context
{
    /** @var KernelInterface */
    private $kernel;

    /** @var Response|null */
    private $response;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @throws \JsonException
     */
    public function parsedResponse()
    {
        return json_decode($this->response->getContent(), true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @Given a user send a :method call to :path
     * @throws \Exception
     */
    public function aUserSendsAMethodRequestTo($method, $path)
    {
        $this->response = $this->kernel->handle(Request::create($path, $method));
    }

    /**
     * @Then the response should have status code :code
     */
    public function theResponseShoudHaveStatusCode($code)
    {
        $statusCode = $this->response->getStatusCode();

        if ($statusCode !== (int)$code) {
            throw new \RuntimeException("Status code $statusCode doesn't math with expected status code $code");
        }
    }

    /**
     * @Given user can see :name field in response
     * @throws \JsonException
     */
    public function responseuserCanSeeFieldInResponse($name)
    {
        if(!$this->parsedResponse()[$name]) {
            throw new \RuntimeException("Can't find $name field in response");
        }
    }

    /**
     * @Then the response contains a list named :name
     * @throws \JsonException
     */
    public function theResponseContainsList($name)
    {
        if(!$this->parsedResponse()[$name]) {
            throw new \RuntimeException("Response doesn't contain $name list");
        }
    }

    /**
     * @Then the response contains a list named :name with :number elements
     * @throws \JsonException
     */
    public function theResponseContainsListWithElements($name, $number)
    {
        if(count($this->parsedResponse()[$name]) !== (int)$number) {
            throw new \RuntimeException("Response doesn't contain $number elements");
        }
    }
}
