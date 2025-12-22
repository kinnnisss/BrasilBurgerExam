<?php

namespace App\Form\Livraison;

use App\Dto\Livraison\LivraisonAssignDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssignLivreurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $livreursChoices = $options['choices_livreurs'];

        $builder
            ->setMethod('POST')
            ->add('livreurId', ChoiceType::class, [
                'required' => true,
                'placeholder' => 'Choisir un livreur',
                'choices' => $livreursChoices,
                'choice_value' => fn ($v) => (string) $v,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LivraisonAssignDto::class,
            'csrf_protection' => true,
            'method' => 'POST',
            'choices_livreurs' => [],
        ]);

        $resolver->setAllowedTypes('choices_livreurs', 'array');
    }
}
