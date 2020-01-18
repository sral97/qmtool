<?php


namespace App\Form\DataTransformer;


use App\Entity\Incident;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class IncidentToNumberTransformer implements DataTransformerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Transforms an object (incident) to a string (number).
     *
     * @param  Incident|null $incident
     * @return string
     */
    public function transform($incident)
    {
        if (null === $incident) {
            return '';
        }

        return $incident->getId();
    }

    /**
     * Transforms a string (number) to an object (incident).
     *
     * @param  string $incidentNumber
     * @return Incident|null
     * @throws TransformationFailedException if object (incident) is not found.
     */
    public function reverseTransform($incidentNumber)
    {
        // no incident number? It's optional, so that's ok
        if (!$incidentNumber) {
            return;
        }

        $incident = $this->entityManager
            ->getRepository(Incident::class)
            // query for the incident with this id
            ->find($incidentNumber);

        if (null === $incident) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(sprintf(
                'An incident with number "%s" does not exist!',
                $incidentNumber
            ));
        }

        return $incident;
    }
}