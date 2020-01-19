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
            new TwigFilter('price', [$this, 'priceFilter']),
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

    public function priceFilter(int $value): ?string
    {
        return number_format($value/100, 2, ',', '.') . ' €';
    }
}
