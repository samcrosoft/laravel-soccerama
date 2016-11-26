<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 26/11/2016
 * Time: 19:39
 */

namespace Samcrosoft\Soccerama\Initiators\Competitions;

use Samcrosoft\Soccerama\Initiators\BaseInitiator;

/**
 * Class CompetitionsAllInitiator
 *
 * @package Samcrosoft\Soccerama\Initiators\Competitions
 */
class CompetitionsAllInitiator extends BaseInitiator
{

    /**
     * This will include the country in the call
     *
     * @return $this
     */
    public function includeCountry()
    {
        $this->addUniqueIncludeKey("country");
        return $this;
    }

    /**
     * @return $this
     */
    public function includeCurrentSeason()
    {
        $this->addUniqueIncludeKey("currentSeason");
        return $this;
    }


    /**
     * @return $this
     */
    public function includeSeasons()
    {
        $this->addUniqueIncludeKey("seasons");
        return $this;
    }
}