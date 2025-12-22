<?php

namespace App\Form\Commande;

use App\Dto\Commande\CommandeListFilterDto;
use App\Enum\EtatCommandeEnum;
use App\Enum\TypeArticleEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeListFilterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setMethod('GET')
            ->add('date', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
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
            ])
            ->add('typeArticle', ChoiceType::class, [
                'required' => false,
                'placeholder' => 'Tous',
                'choices' => [
                    'Burger' => TypeArticleEnum::BURGER,
                    'Menu' => TypeArticleEnum::MENU,
                ],
                'choice_value' => fn (?TypeArticleEnum $t) => $t?->value,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CommandeListFilterDto::class,
            'csrf_protection' => false,
            'method' => 'GET',
        ]);
    }
}
