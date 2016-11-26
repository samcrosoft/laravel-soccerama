<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 23:54
 */

namespace Samcrosoft\Soccerama\Initiators\Countries;

use Samcrosoft\Soccerama\Initiators\BaseInitiator;

/**
 * Class CountryAllInitiator
 *
 * @package Samcrosoft\Soccerama\Initiators\Countries
 */
class CountryAllInitiator extends BaseInitiator
{

    var $endpoint = "countries";

    /**
     * @return $this
     */
    public function includeCompetitions()
    {
        $this->addUniqueIncludeKey("competitions");
        return $this;
    }


    public function getCountryByID($country_id)
    {
        $this->appendToEndPointUrl($country_id);
    }


}