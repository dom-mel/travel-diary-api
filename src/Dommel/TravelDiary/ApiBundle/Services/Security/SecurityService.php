<?php
namespace Dommel\TravelDiary\ApiBundle\Services\Security;

/**
 * @author Dominik Eckelmann
 */
class SecurityService
{

    public function hash($text)
    {
        return hash('sha512', $text);
    }

}
