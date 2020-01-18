<?php

namespace App\Twig;

use App\Entity\Incident;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class QmToolExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('incidentType', [$this, 'getIncidentType']),
        ];
    }

    public function getFunctions(): array
    {
        return [];
    }

    public function getIncidentType(int $value): ?string
    {
        return Incident::getTypeName($value);
    }
}
