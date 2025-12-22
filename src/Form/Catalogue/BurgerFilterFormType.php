<?php

namespace App\Form\Catalogue;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class BurgerFilterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setMethod('GET')
            ->add('q', TextType::class, [
                'required' => false,
                'attr' => ['placeholder' => 'Rechercher un burger…'],
                'constraints' => [new Assert\Length(max: 150)],
            ])
            ->add('status', ChoiceType::class, [
                'required' => false,
                'placeholder' => 'Tous',
                'choices' => [
                    'Actifs' => 'ACTIVE',
                    'Archivés' => 'ARCHIVED',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'method' => 'GET',
        ]);
    }
}
