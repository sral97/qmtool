<?php

namespace App\Form\Type;

use App\Entity\Incident;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IncidentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'data' => new \DateTime()
            ])
            ->add('reporter')
            ->add('type')
            ->add('description')
            ->add('immediateAction')
            ->add('fixed')
            ->add('correctiveActionNeeded')
            ->add('responsibleQualityManager')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Incident::class,
        ]);
    }
}