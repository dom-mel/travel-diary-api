<?php

namespace Dommel\TravelDiary\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class SessionEntity {

    /**
     * @ORM\ManyToOne(targetEntity="UserEntity")
     * @var UserEntity
     */
    protected $user;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=200)
     * @var string
     */
    protected $sessionId;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $created;

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param \Dommel\TravelDiary\ApiBundle\Entity\UserEntity $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \Dommel\TravelDiary\ApiBundle\Entity\UserEntity
     */
    public function getUser()
    {
        return $this->user;
    }

}