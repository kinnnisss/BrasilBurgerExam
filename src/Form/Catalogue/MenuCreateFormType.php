<?php

namespace App\Form\Catalogue;

use App\Dto\Catalogue\MenuCreateDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Dto\Common\SelectItemDto;
class MenuCreateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    $burgerChoices = [];
    foreach ($options['choices_burgers'] as $c) {
        /** @var SelectItemDto $c */
        $burgerChoices[$c->label] = $c->id;
    }

    $fritesChoices = [];
    foreach ($options['choices_frites'] as $c) {
        /** @var SelectItemDto $c */
        $fritesChoices[$c->label] = $c->id;
    }

    $boissonChoices = [];
    foreach ($options['choices_boissons'] as $c) {
        /** @var SelectItemDto $c */
        $boissonChoices[$c->label] = $c->id;
    }

    $builder
        ->add('nom', TextType::class, [
            'required' => true,
            'attr' => ['placeholder' => 'Ex: Menu Classic Brasil'],
        ])
        ->add('burgerId', ChoiceType::class, [
            'required' => true,
            'placeholder' => 'Choisir un burger',
            'choices' => $burgerChoices,
        ])
        ->add('fritesId', ChoiceType::class, [
            'required' => true,
            'placeholder' => 'Choisir des frites',
            'choices' => $fritesChoices,
        ])
        ->add('boissonId', ChoiceType::class, [
            'required' => true,
            'placeholder' => 'Choisir une boisson',
            'choices' => $boissonChoices,
        ])
        ->add('imageFile', FileType::class, [
            'required' => false,
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
            'data_class' => MenuCreateDto::class,
            'csrf_protection' => true,
            'choices_burgers' => [],
            'choices_frites' => [],
            'choices_boissons' => [],
        ]);

        $resolver->setAllowedTypes('choices_burgers', 'array');
        $resolver->setAllowedTypes('choices_frites', 'array');
        $resolver->setAllowedTypes('choices_boissons', 'array');
    }
}
