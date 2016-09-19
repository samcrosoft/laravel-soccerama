<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 21:44
 */

namespace Samcrosoft\Soccerama\Endpoints;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Samcrosoft\Soccerama\Factory\SocceramaFactory;
use Samcrosoft\Soccerama\Initiators\BaseInitiator;
use Samcrosoft\Soccerama\Presenters\Countries\Country;

abstract class BaseEndpoint
{
    /**
     * @var null|string
     */
    var $endpoint_url = null;

    /**
     * @var null|string
     */
    var $presenter = null;

    /**
     * @var SocceramaFactory
     */
    private $factory;


    /**
     * BaseEndpoint constructor.
     *
     * @param SocceramaFactory $factory
     */
    public function __construct(SocceramaFactory $factory)
    {
        $this->factory = $factory;
    }


    /**
     * @return SocceramaFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @param BaseInitiator $initiator
     *
     * @return array
     */
    public function makeRequest(BaseInitiator $initiator)
    {
        /*
         * setup the http client
         */
        $client = $this->getHttpClient($initiator);

        $response = $client->get($initiator->getInitiatorUrl());
        $parsedResponse = $this->parseResponse($response);

        $mappedResponse = is_null($this->presenter) ?
            $parsedResponse :
            $this->mapToPresenter($parsedResponse, Country::class);
        return $mappedResponse;
    }


    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $body = $response->getBody();
        $contents = $body->getContents();
        $json = json_decode($contents, true);
        return collect($json)->get("data");
    }

    /**
     * @param array|null  $data
     *
     * @param string $presenter
     *
     * @return array
     */
    protected function mapToPresenter($data, $presenter)
    {
        if (empty($data))
            return [];


        return collect($data)->map(function ($entry) use ($presenter) {
            return app($presenter, [$entry]);
        })->toArray();
    }

    /**
     * @param BaseInitiator $initiator
     *
     * @return Client
     */
    protected function getHttpClient(BaseInitiator $initiator)
    {
        $client = new Client([
            'base_uri' => $this->getFactory()->getApiBaseUrl(),
            'verify'   => false,    //disable SSL verification
            'query'    => [
                'api_token' => $this->getFactory()->getApiToken(),
                'include'   => $initiator->getIncludes(),
            ],
        ]);
        return $client;
    }
}