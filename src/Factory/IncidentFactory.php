<?php


namespace App\Factory;


use App\Entity\Incident;

class IncidentFactory
{
    /** @var string */
    private $autoQm;

    public function __construct(string $autoQm)
    {
        $this->autoQm = $autoQm;
    }

    public function createIncident(?string $qm = null): Incident
    {
        $incident = new Incident();
        $incident->setResponsibleQualityManager($qm ?: $this->autoQm);
        return $incident;
    }
}