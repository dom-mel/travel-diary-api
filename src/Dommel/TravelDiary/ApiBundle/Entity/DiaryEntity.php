<?php

namespace Dommel\TravelDiary\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Dommel\TravelDiary\ApiBundle\Entity\DiaryRepository")
 */
class DiaryEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $title;

    /**
     * @ORM\ManyToOne(targetEntity="UserEntity")
     * @var UserEntity
     */
    protected $user;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $text;

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param \Dommel\TravelDiary\ApiBundle\Entity\UserEntity $user
     */
    public function setUser($user) {
        $this->user = $user;
    }

    /**
     * @return \Dommel\TravelDiary\ApiBundle\Entity\UserEntity
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * @param string $text
     */
    public function setText($text) {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText() {
        return $this->text;
    }
}
