<?php

namespace App\Form;

use App\Dto\Client\ClientCommandeFilterDto;
use App\Enum\EtatCommandeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientCommandeFilterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('etat', ChoiceType::class, [
                'required' => false,
                'placeholder' => 'Tous',
                'choices' => [
                    'En cours' => EtatCommandeEnum::ENCOURS,
                    'Validée' => EtatCommandeEnum::VALIDEE,
                    'Terminée' => EtatCommandeEnum::TERMINER,
                    'Annulée' => EtatCommandeEnum::ANNULEE,
                ],
                'choice_value' => fn(?EtatCommandeEnum $e) => $e?->value,
                'choice_label' => fn(EtatCommandeEnum $e) => match ($e) {
                    EtatCommandeEnum::ENCOURS => 'En cours',
                    EtatCommandeEnum::VALIDEE => 'Validée',
                    EtatCommandeEnum::TERMINER => 'Terminée',
                    EtatCommandeEnum::ANNULEE => 'Annulée',
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ClientCommandeFilterDto::class,
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
}
