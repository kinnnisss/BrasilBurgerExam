<?php

namespace App\Dto\Catalogue;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class BurgerUpsertDto
{
    #[Assert\NotBlank(message: 'Le nom est obligatoire.')]
    #[Assert\Length(max: 150, maxMessage: 'Max {{ limit }} caractères.')]
    public string $nom = '';

    #[Assert\NotBlank(message: 'Le prix est obligatoire.')]
    #[Assert\Regex(
        pattern: '/^\d+(\.\d{1,2})?$/',
        message: 'Prix invalide (ex: 2500 ou 2500.50).'
    )]
    #[Assert\GreaterThan(value: 0, message: 'Le prix doit être strictement positif.')]
    public string $prix = '';

    #[Assert\File(
        maxSize: '4M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
        mimeTypesMessage: 'Image invalide (jpg, png, webp).'
    )]
    public ?UploadedFile $imageFile = null;
}
