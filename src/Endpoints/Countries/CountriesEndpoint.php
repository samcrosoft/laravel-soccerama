<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 21:41
 */

namespace Samcrosoft\Soccerama\Endpoints\Countries;


use Samcrosoft\Soccerama\Endpoints\BaseEndpoint;
use Samcrosoft\Soccerama\Initiators\BaseInitiator;
use Samcrosoft\Soccerama\Initiators\Countries\CountryAllInitiator;
use Samcrosoft\Soccerama\Presenters\Countries\Country;

/**
 * Class CountriesEndpoint
 *
 * @package Samcrosoft\Soccerama\Endpoints\Countries
 */
class CountriesEndpoint extends BaseEndpoint
{

    var $endpoint_url = "countries";

    /**
     * @var string
     */
    var $presenter = Country::class;

    /**
     * @return BaseInitiator
     */
    public function all()
    {
        return new CountryAllInitiator($this);
    }


    /**
     * @param $country_id
     */
    public function getCountyByID($country_id)
    {
        $oCountry = new CountryAllInitiator($this);
        return $oCountry->getCountryByID($country_id);
    }
}