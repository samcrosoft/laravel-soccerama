<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 26/11/2016
 * Time: 19:49
 */

namespace Samcrosoft\Soccerama\Initiators\Matches;


use Samcrosoft\Soccerama\Initiators\BaseInitiator;

/**
 * Class MatchesInitiator
 *
 * @package Samcrosoft\Soccerama\Initiators\Matches
 */
class MatchesInitiator extends BaseInitiator
{
    /**
     * @return $this
     */
    public function includePlayer()
    {
        $this->addUniqueIncludeKey("player");
        return $this;
    }


    public function getMatchByID($match_id)
    {
        // work on this!
    }
}