<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IncidentRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Incident
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
     * @ORM\Column(type="string", length=255)
     */
    private $reporter;

    /**
     * @ORM\Column(type="smallint")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $immediateAction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fixed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $correctiveActionNeeded;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responsibleQualityManager;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $poorQualityCosts;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $overhead;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $risk;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CorrectiveAction", mappedBy="incident", orphanRemoval=true)
     */
    private $correctiveActions;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

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

    public function __construct()
    {
        $this->correctiveActions = new ArrayCollection();
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

    public function getReporter(): ?string
    {
        return $this->reporter;
    }

    public function setReporter(string $reporter): self
    {
        $this->reporter = $reporter;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImmediateAction(): ?string
    {
        return $this->immediateAction;
    }

    public function setImmediateAction(string $immediateAction): self
    {
        $this->immediateAction = $immediateAction;

        return $this;
    }

    public function getFixed(): ?bool
    {
        return $this->fixed;
    }

    public function setFixed(bool $fixed): self
    {
        $this->fixed = $fixed;

        return $this;
    }

    public function getCorrectiveActionNeeded(): ?bool
    {
        return $this->correctiveActionNeeded;
    }

    public function setCorrectiveActionNeeded(bool $correctiveActionNeeded): self
    {
        $this->correctiveActionNeeded = $correctiveActionNeeded;

        return $this;
    }

    public function getResponsibleQualityManager(): ?string
    {
        return $this->responsibleQualityManager;
    }

    public function setResponsibleQualityManager(string $responsibleQualityManager): self
    {
        $this->responsibleQualityManager = $responsibleQualityManager;

        return $this;
    }

    public function getPoorQualityCosts(): ?int
    {
        return $this->poorQualityCosts;
    }

    public function setPoorQualityCosts(?int $poorQualityCosts): self
    {
        $this->poorQualityCosts = $poorQualityCosts;

        return $this;
    }

    public function getOverhead(): ?int
    {
        return $this->overhead;
    }

    public function setOverhead(?int $overhead): self
    {
        $this->overhead = $overhead;

        return $this;
    }

    public function getRisk(): ?string
    {
        return $this->risk;
    }

    public function setRisk(?string $risk): self
    {
        $this->risk = $risk;

        return $this;
    }

    /**
     * @return Collection|CorrectiveAction[]
     */
    public function getCorrectiveActions(): Collection
    {
        return $this->correctiveActions;
    }

    public function addCorrectiveAction(CorrectiveAction $correctiveAction): self
    {
        if (!$this->correctiveActions->contains($correctiveAction)) {
            $this->correctiveActions[] = $correctiveAction;
            $correctiveAction->setIncident($this);
        }

        return $this;
    }

    public function removeCorrectiveAction(CorrectiveAction $correctiveAction): self
    {
        if ($this->correctiveActions->contains($correctiveAction)) {
            $this->correctiveActions->removeElement($correctiveAction);
            // set the owning side to null (unless already changed)
            if ($correctiveAction->getIncident() === $this) {
                $correctiveAction->setIncident(null);
            }
        }

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
