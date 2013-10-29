<?php

namespace Dommel\TravelDiary\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PhotoEntity {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    protected $latitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    protected $longitude;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    protected $takenOn;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    protected $camera;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    protected $exposure;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    protected $aperture;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    protected $focalLength;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $iso;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    protected $flash;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $height;

    /**
     * @ORM\ManyToOne(targetEntity="DiaryEntity")
     * @var DiaryEntity
     */
    protected $diary;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $mime;
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $size;

    /**
     * @param string $aperture
     */
    public function setAperture($aperture) {
        $this->aperture = $aperture;
    }

    /**
     * @return string
     */
    public function getAperture() {
        return $this->aperture;
    }

    /**
     * @param string $camera
     */
    public function setCamera($camera) {
        $this->camera = $camera;
    }

    /**
     * @return string
     */
    public function getCamera() {
        return $this->camera;
    }

    /**
     * @param string $exposure
     */
    public function setExposure($exposure) {
        $this->exposure = $exposure;
    }

    /**
     * @return string
     */
    public function getExposure() {
        return $this->exposure;
    }

    /**
     * @param string $flash
     */
    public function setFlash($flash) {
        $this->flash = $flash;
    }

    /**
     * @return string
     */
    public function getFlash() {
        return $this->flash;
    }

    /**
     * @param string $focalLength
     */
    public function setFocalLength($focalLength) {
        $this->focalLength = $focalLength;
    }

    /**
     * @return string
     */
    public function getFocalLength() {
        return $this->focalLength;
    }

    /**
     * @param int $height
     */
    public function setHeight($height) {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getHeight() {
        return $this->height;
    }

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
     * @param int $iso
     */
    public function setIso($iso) {
        $this->iso = $iso;
    }

    /**
     * @return int
     */
    public function getIso() {
        return $this->iso;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLongitude() {
        return $this->longitude;
    }

    /**
     * @param \DateTime $takenOn
     */
    public function setTakenOn($takenOn) {
        $this->takenOn = $takenOn;
    }

    /**
     * @return \DateTime
     */
    public function getTakenOn() {
        return $this->takenOn;
    }

    /**
     * @param int $width
     */
    public function setWidth($width) {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * @param \Dommel\TravelDiary\ApiBundle\Entity\DiaryEntity $diary
     */
    public function setDiary($diary) {
        $this->diary = $diary;
    }

    /**
     * @return \Dommel\TravelDiary\ApiBundle\Entity\DiaryEntity
     */
    public function getDiary() {
        return $this->diary;
    }

    /**
     * @param string $mime
     */
    public function setMime($mime) {
        $this->mime = $mime;
    }

    /**
     * @return string
     */
    public function getMime() {
        return $this->mime;
    }

    /**
     * @param int $size
     */
    public function setSize($size) {
        $this->size = $size;
    }

    /**
     * @return int
     */
    public function getSize() {
        return $this->size;
    }


}
