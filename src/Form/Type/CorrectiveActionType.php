<?php

namespace App\Form\Type;

use App\Entity\CorrectiveAction;
use App\Form\DataTransformer\IncidentToNumberTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CorrectiveActionType extends AbstractType
{

    /**
     * @var IncidentToNumberTransformer
     */
    private $incidentToNumberTransformer;

    public function __construct(IncidentToNumberTransformer $incidentToNumberTransformer)
    {
        $this->incidentToNumberTransformer = $incidentToNumberTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('analysisAndIdea')
            ->add('actions')
            ->add('approvedByManagement')
            ->add('implementedUntil')
            ->add('implementedBy')
            ->add('effectivenessProofedBy')
            ->add('effectivenessProofedAt')
            ->add('effectivenessProofedThrough')
            ->add('incident', HiddenType::class)
        ;

        $builder->get('incident')->addModelTransformer($this->incidentToNumberTransformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CorrectiveAction::class,
        ]);
    }
}
