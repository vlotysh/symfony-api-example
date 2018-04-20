<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SettingsRepository")
 */
class Settings
{
    protected $properties;

    public function __construct()
    {
        $this->properties = [];
    }

    /**
     * @param $prop property name
     * @return mixed
     */
    public function __get($prop): ?int
    {
        if(!isset($this->properties[$prop])) {
            return null;
        }

        return $this->properties[$prop];
    }

    /**
     * Return all settings
     * @return array
     */
    public function toArray(): Array
    {
        return $this->properties;
    }

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $allowedCheckInTime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $allowedUnCheckInTime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $checkInRadiusInMeters;

    public function getId()
    {
        return $this->id;
    }

    public function getAllowedCheckInTime(): ?int
    {
        return $this->allowedCheckInTime;
    }

    public function setAllowedCheckInTime(?int $allowedCheckInTime): self
    {
        $this->allowedCheckInTime = $allowedCheckInTime;
        $this->properties['allowedCheckInTime'] = $allowedCheckInTime;

        return $this;
    }

    public function getAllowedUnCheckInTime(): ?int
    {
        return $this->allowedUnCheckInTime;
    }

    public function setAllowedUnCheckInTime(?int $allowedUnCheckInTime): self
    {
        $this->allowedUnCheckInTime = $allowedUnCheckInTime;
        $this->properties['allowedUnCheckInTime'] = $allowedUnCheckInTime;

        return $this;
    }

    public function getCheckInRadiusInMeters(): ?int
    {
        return $this->checkInRadiusInMeters;
    }

    public function setCheckInRadiusInMeters(?int $checkInRadiusInMeters): self
    {
        $this->checkInRadiusInMeters = $checkInRadiusInMeters;
        $this->properties['checkInRadiusInMeters'] = $checkInRadiusInMeters;

        return $this;
    }
}
