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
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Ex: Menu Classic Brasil'],
            ])
            ->add('burgerId', ChoiceType::class, [
                'required' => true,
                'placeholder' => 'Choisir un burger',
                'choices' => $options['choices_burgers'],
                'choice_label' => fn (?SelectItemDto $c) => $c?->label ?? '',
                'choice_value' => fn (?SelectItemDto $c) => $c?->id ? (string) $c->id : '',
            ])

            ->add('fritesId', ChoiceType::class, [
                'required' => true,
                'placeholder' => 'Choisir des frites',
                'choices' => $options['choices_frites'],
                'choice_label' => fn (?SelectItemDto $c) => $c?->label ?? '',
                'choice_value' => fn (?SelectItemDto $c) => $c?->id ? (string) $c->id : '',
            ])

            ->add('boissonId', ChoiceType::class, [
                'required' => true,
                'placeholder' => 'Choisir une boisson',
                'choices' => $options['choices_boissons'],
                'choice_label' => fn (?SelectItemDto $c) => $c?->label ?? '',
                'choice_value' => fn (?SelectItemDto $c) => $c?->id ? (string) $c->id : '',
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
