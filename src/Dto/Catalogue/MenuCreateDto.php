<?php

namespace App\Dto\Catalogue;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class MenuCreateDto
{
    #[Assert\NotBlank(message: 'Le nom est obligatoire.')]
    #[Assert\Length(max: 150, maxMessage: 'Max {{ limit }} caractères.')]
    public string $nom = '';

    #[Assert\Positive(message: 'Burger invalide.')]
    public int $burgerId = 0;

    #[Assert\Positive(message: 'Frites invalides.')]
    public int $fritesId = 0;

    #[Assert\Positive(message: 'Boisson invalide.')]
    public int $boissonId = 0;

    #[Assert\File(
        maxSize: '4M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
        mimeTypesMessage: 'Image invalide (jpg, png, webp).'
    )]
    public ?UploadedFile $imageFile = null;
}
