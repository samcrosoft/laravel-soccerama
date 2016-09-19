<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 21:44
 */

namespace Samcrosoft\Soccerama\Endpoints;

use Purl\Url;
use Samcrosoft\Soccerama\Factory\SocceramaFactory;
use Samcrosoft\Soccerama\Initiators\BaseInitiator;
use Samcrosoft\Soccerama\Presenters\Countries\Country;

/**
 * Class BaseEndpoint
 * @package Samcrosoft\Soccerama\Endpoints
 */
abstract class BaseEndpoint
{

    /**
     * @const string
     */
    const RESPONSE_KEY_DATA = "data";
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
         * setup the http client and get the response
         */
        $response = $this->getHttpResponse($initiator);
        $parsedResponse = $this->parseResponse($response);

        $mappedResponse = is_null($this->presenter) ?
            $parsedResponse :
            $this->mapToPresenter($parsedResponse, Country::class);
        return $mappedResponse;
    }


    /**
     * @param \Requests_Response $response
     * @return array
     */
    protected function parseResponse(\Requests_Response $response)
    {
        $body = $response->body;
        $json = json_decode($body, true);
        return collect($json)->get(self::RESPONSE_KEY_DATA);
    }

    /**
     * @param array|null $data
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
     * @return \Requests_Response
     */
    protected function getHttpResponse(BaseInitiator $initiator)
    {
        $url = $this->getRequestURL($initiator);
        $headers = [];
        $options = [
            'verify' => !(config("soccerama.disable_ssl_verification", false))
        ];
        return \Requests::get($url->getUrl(), $headers, $options);
    }

    /**
     * @param BaseInitiator $initiator
     * @return Url
     */
    private function getRequestURL(BaseInitiator $initiator)
    {
        $url = new Url($this->getFactory()->getApiBaseUrl());
        /*
         * Add the initiator endpoint as path to the base url
         */
        $url->path->add($initiator->getInitiatorUrl());

        $options = [
            'api_token' => $this->getFactory()->getApiToken(),
            'include' => $this->buildIncludes($initiator->getIncludes()),
        ];
        $url->query->setData($options);

        return $url;
    }

    /**
     * @param array|null $includes
     * @return array|string
     */
    private function buildIncludes(array $includes = null)
    {
        if (!empty($includes) && is_array($includes)) {
            $includes = implode(",", $includes);
        } else {
            $includes = "";
        }

        return $includes;
    }
}