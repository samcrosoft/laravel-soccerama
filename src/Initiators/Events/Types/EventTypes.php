<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 26/11/2016
 * Time: 19:46
 */

namespace Samcrosoft\Soccerama\Initiators\Events\Types;


/**
 * Class EventTypes
 *
 * @package Samcrosoft\Soccerama\Initiators\Events\Types
 */
abstract class EventTypes
{
    const TYPE_GOAL = "goal";
    const TYPE_PENALTY = "penalty";
    const TYPE_MISSED_PENALTY = "missed_penalty";
    const TYPE_OWN_GOAL = "own-goal";
    const TYPE_YELLOW_CARD = "yellowcard";
    const TYPE_YELLOW_RED = "yellowred";
    const TYPE_RED_CARD = "redcard";
    const TYPE_SUBSTITUTION = "substitution";
}