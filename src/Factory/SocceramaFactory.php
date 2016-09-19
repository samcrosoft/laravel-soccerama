<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 21:37
 */

namespace Samcrosoft\Soccerama\Factory;


use Samcrosoft\Soccerama\Exceptions\NoApiTokenException;
use Samcrosoft\Soccerama\Exceptions\NoBaseURLExceptions;

/**
 * Class SocceramaFactory
 *
 * @package Samcrosoft\Soccerama\Factory
 */
class SocceramaFactory
{

    /**
     * @const string
     */
    const CONFIG_KEY_SOCCERAMA_API_BASE = "soccerama.api_base";

    /**
     * @const string
     */
    const CONFIG_KEY_SOCCERAMA_API_TOKEN = "soccerama.api_token";

    /**
     * SocceramaFactory constructor.
     */
    public function __construct()
    {
        /*
         * check the dependencies
         */
        $this->checkDependencies();
    }


    private function checkDependencies()
    {

        /*
         * check the api base
         */
        $endpoint = config(self::CONFIG_KEY_SOCCERAMA_API_BASE);
        if (empty($endpoint)) {
            throw new NoBaseURLExceptions;
        }

        /*
         * check the api token
         */
        $soccerama_api_token = config(self::CONFIG_KEY_SOCCERAMA_API_TOKEN);
        if (empty($soccerama_api_token)) {
            throw new NoApiTokenException;
        }
    }


    /**
     * @return string|null
     */
    public function getApiToken()
    {
        return config(self::CONFIG_KEY_SOCCERAMA_API_TOKEN);
    }


    /**
     * This will return the base URL for the api
     * @return string
     */
    public function getApiBaseUrl()
    {
        $endpoint = config(self::CONFIG_KEY_SOCCERAMA_API_BASE);
        $endpoint = rtrim($endpoint, "\\/");
        return $endpoint;
    }


}