<?php

namespace App\Form\Catalogue;

use App\Dto\Catalogue\BurgerUpsertDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BurgerCreateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Nom du burger'],
            ])
            ->add('prix', MoneyType::class, [
                'required' => true,
                'currency' => false,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan(0),
                ],
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\File(
                        maxSize: '2M',
                        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
                        mimeTypesMessage: 'Image invalide (jpg, png, webp).'
                    ),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BurgerUpsertDto::class,
            'csrf_protection' => true,
        ]);
    }
}
