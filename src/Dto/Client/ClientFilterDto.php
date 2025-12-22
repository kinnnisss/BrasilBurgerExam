<?php

namespace App\Dto\Client;

use Symfony\Component\Validator\Constraints as Assert;

class ClientFilterDto
{
    #[Assert\Length(max: 100, maxMessage: 'Max {{ limit }} caractères.')]
    public ?string $q = null;

    #[Assert\Positive(message: 'Page invalide.')]
    public int $page = 1;

    #[Assert\Range(min: 1, max: 200)]
    public int $pageSize = 20;
}
