<?php

namespace App\Form\Livraison;

use App\Dto\Livraison\LivraisonFilterDto;
use App\Enum\EtatCommandeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivraisonFilterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $zones = $options['choices_zones'];
        $livreurs = $options['choices_livreurs'];

        $builder
            ->setMethod('GET')
            ->add('zoneId', ChoiceType::class, [
                'required' => false,
                'placeholder' => 'Toutes zones',
                'choices' => $zones,
                'choice_value' => fn ($v) => $v === null ? '' : (string) $v,
            ])
            ->add('livreurId', ChoiceType::class, [
                'required' => false,
                'placeholder' => 'Tous livreurs',
                'choices' => $livreurs,
                'choice_value' => fn ($v) => $v === null ? '' : (string) $v,
            ])
            ->add('etat', ChoiceType::class, [
                'required' => false,
                'placeholder' => 'Tous états',
                'choices' => [
                    'En cours' => EtatCommandeEnum::ENCOURS,
                    'Validée' => EtatCommandeEnum::VALIDEE,
                    'Terminée' => EtatCommandeEnum::TERMINER,
                    'Annulée' => EtatCommandeEnum::ANNULEE,
                ],
                'choice_value' => fn (?EtatCommandeEnum $e) => $e?->value,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LivraisonFilterDto::class,
            'csrf_protection' => false,
            'method' => 'GET',
            'choices_zones' => [],
            'choices_livreurs' => [],
        ]);

        $resolver->setAllowedTypes('choices_zones', 'array');
        $resolver->setAllowedTypes('choices_livreurs', 'array');
    }
}
