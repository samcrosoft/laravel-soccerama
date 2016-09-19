<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 21:34
 */

namespace Samcrosoft\Soccerama;


use Illuminate\Foundation\Application;
use Samcrosoft\Soccerama\Endpoints\Countries\CountriesEndpoint;

/**
 * Class SocceramaManager
 *
 * @package Samcrosoft\Soccerama
 */
class SocceramaManager
{

    /**
     * @var Application $app
     */
    var $app;

    /**
     * SocceramaManager constructor.
     *
     * @param Application      $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return CountriesEndpoint
     */
    public function Countries()
    {
        return app(CountriesEndpoint::class);
    }
}