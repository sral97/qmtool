<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApplicationSettingsRepository")
 */
class ApplicationSettings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70, unique=true)
     */
    private $settingsKey;

    /**
     * @ORM\Column(type="text")
     */
    private $settingsValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSettingsKey(): ?string
    {
        return $this->settingsKey;
    }

    public function setSettingsKey(string $settingsKey): self
    {
        $this->settingsKey = $settingsKey;

        return $this;
    }

    public function getSettingsValue(): ?string
    {
        return $this->settingsValue;
    }

    public function setSettingsValue(string $settingsValue): self
    {
        $this->settingsValue = $settingsValue;

        return $this;
    }
}
