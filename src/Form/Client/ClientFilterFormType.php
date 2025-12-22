<?php

namespace App\Form\Client;

use App\Dto\Client\ClientFilterDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientFilterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setMethod('GET')
            ->add('q', TextType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher…',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ClientFilterDto::class,
            'csrf_protection' => false,
            'method' => 'GET',
        ]);
    }
}
