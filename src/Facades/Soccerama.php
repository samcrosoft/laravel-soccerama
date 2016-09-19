<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 21:30
 */

namespace Samcrosoft\Soccerama\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class Soccerama
 *
 * @package Samcrosoft\Soccerama\Facades
 */
class Soccerama extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'soccerama';
    }
}
