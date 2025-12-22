<?php

namespace App\Form\Catalogue;

use App\Dto\Catalogue\ComplementUpsertDto;
use App\Enum\TypeComplementEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComplementUpsertFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Ex: Frites Classiques'],
            ])
            ->add('type', ChoiceType::class, [
                'required' => true,
                'placeholder' => 'Choisir',
                'choices' => [
                    'Frites' => TypeComplementEnum::FRITE,
                    'Boisson' => TypeComplementEnum::BOISSON,
                ],
                'choice_value' => fn (?TypeComplementEnum $t) => $t?->value,
            ])
            ->add('prix', MoneyType::class, [
                'required' => true,
                'currency' => false,
                'attr' => ['placeholder' => 'Ex: 1000'],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan(0),
                ],
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'mapped' => true,
                'constraints' => [
                    new Assert\File(
                        maxSize: '4M',
                        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
                        mimeTypesMessage: 'Image invalide (jpg, png, webp).'
                    ),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ComplementUpsertDto::class,
            'csrf_protection' => true,
        ]);
    }
}
