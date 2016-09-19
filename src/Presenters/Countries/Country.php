<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 23:10
 */

namespace Samcrosoft\Soccerama\Presenters\Countries;


use Samcrosoft\Soccerama\Presenters\BasePresenter;

/**
 * Class Country
 *
 * @package Samcrosoft\Soccerama\Presenters\Countries
 */
class Country extends BasePresenter
{

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->getByKey("name");
    }

    /**
     * @return string|null
     */
    public function iso_code()
    {
        return $this->getByKey("iso_code");
    }

    /**
     * @return string|null
     */
    public function flag()
    {
        return $this->getByKey("flag");
    }

    /**
     * @return string|null
     */
    public function countryID()
    {
        return $this->getByKey("id");
    }

}