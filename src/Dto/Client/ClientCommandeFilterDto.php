<?php

namespace App\Dto\Client;

use App\Enum\EtatCommandeEnum;
use Symfony\Component\Validator\Constraints as Assert;

class ClientCommandeFilterDto
{
    public ?EtatCommandeEnum $etat = null;
    public ?\DateTimeInterface $date = null;

    #[Assert\Positive(message: 'Page invalide.')]
    public int $page = 1;

    #[Assert\Range(min: 1, max: 200)]
    public int $pageSize = 20;
}
