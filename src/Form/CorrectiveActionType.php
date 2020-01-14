<?php

namespace App\Form;

use App\Entity\CorrectiveAction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CorrectiveActionType extends AbstractType
{
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
            ->add('incident')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CorrectiveAction::class,
        ]);
    }
}
