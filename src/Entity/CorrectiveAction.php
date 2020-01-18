<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CorrectiveActionRepository")
 * @ORM\HasLifecycleCallbacks
 */
class CorrectiveAction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $analysisAndIdea;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $actions;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $approvedByManagement;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $implementedUntil;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $implementedBy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $effectivenessProofedBy;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $effectivenessProofedAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $effectivenessProofedThrough;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Incident", inversedBy="correctiveActions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $incident;

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = $this->createdAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updatedAt = new \DateTime("now");
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getAnalysisAndIdea(): ?string
    {
        return $this->analysisAndIdea;
    }

    public function setAnalysisAndIdea(?string $analysisAndIdea): self
    {
        $this->analysisAndIdea = $analysisAndIdea;

        return $this;
    }

    public function getActions(): ?string
    {
        return $this->actions;
    }

    public function setActions(?string $actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    public function getApprovedByManagement(): ?bool
    {
        return $this->approvedByManagement;
    }

    public function setApprovedByManagement(?bool $approvedByManagement): self
    {
        $this->approvedByManagement = $approvedByManagement;

        return $this;
    }

    public function getImplementedUntil(): ?\DateTimeInterface
    {
        return $this->implementedUntil;
    }

    public function setImplementedUntil(?\DateTimeInterface $implementedUntil): self
    {
        $this->implementedUntil = $implementedUntil;

        return $this;
    }

    public function getImplementedBy(): ?string
    {
        return $this->implementedBy;
    }

    public function setImplementedBy(?string $implementedBy): self
    {
        $this->implementedBy = $implementedBy;

        return $this;
    }

    public function getEffectivenessProofedBy(): ?string
    {
        return $this->effectivenessProofedBy;
    }

    public function setEffectivenessProofedBy(?string $effectivenessProofedBy): self
    {
        $this->effectivenessProofedBy = $effectivenessProofedBy;

        return $this;
    }

    public function getEffectivenessProofedAt(): ?\DateTimeInterface
    {
        return $this->effectivenessProofedAt;
    }

    public function setEffectivenessProofedAt(?\DateTimeInterface $effectivenessProofedAt): self
    {
        $this->effectivenessProofedAt = $effectivenessProofedAt;

        return $this;
    }

    public function getEffectivenessProofedThrough(): ?string
    {
        return $this->effectivenessProofedThrough;
    }

    public function setEffectivenessProofedThrough(?string $effectivenessProofedThrough): self
    {
        $this->effectivenessProofedThrough = $effectivenessProofedThrough;

        return $this;
    }

    public function getIncident(): ?Incident
    {
        return $this->incident;
    }

    public function setIncident(?Incident $incident): self
    {
        $this->incident = $incident;

        return $this;
    }
}
