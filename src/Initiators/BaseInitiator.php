<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 23:54
 */

namespace Samcrosoft\Soccerama\Initiators;


use Samcrosoft\Soccerama\Endpoints\BaseEndpoint;

/**
 * Class BaseInitiator
 *
 * @package Samcrosoft\Soccerama\Initiators
 */
abstract class BaseInitiator
{
    private $includes = [];
    /**
     * @var BaseEndpoint
     */
    private $endpoint;


    /**
     * CountriesAllPoint constructor.
     *
     * @param BaseEndpoint $endpoint
     */
    public function __construct(BaseEndpoint $endpoint)
    {

        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->endpoint->makeRequest($this);
    }

    /**
     * @param $key
     */
    protected function addUniqueIncludeKey($key)
    {
        if (!isset($this->includes[ $key ])) {
            $this->includes[] = $key;
        }
    }

    /**
     * @return array
     */
    public function getIncludes()
    {
        return $this->includes;
    }

    /**
     * @return null|string
     */
    public function getInitiatorUrl()
    {
        return $this->endpoint->endpoint_url;
    }

}