<?php

namespace App\Dto\Commande;

use App\Enum\EtatCommandeEnum;
use App\Enum\TypeArticleEnum;
use Symfony\Component\Validator\Constraints as Assert;

class CommandeListFilterDto
{
    public ?\DateTimeInterface $date = null;

    public ?EtatCommandeEnum $etat = null;

    #[Assert\Choice(
        choices: [TypeArticleEnum::BURGER, TypeArticleEnum::MENU],
        message: 'Le filtre typeArticle accepte seulement BURGER ou MENU.'
    )]
    public ?TypeArticleEnum $typeArticle = null;

    #[Assert\Positive(message: 'Page invalide.')]
    public int $page = 1;

    #[Assert\Range(min: 1, max: 200, notInRangeMessage: 'pageSize entre {{ min }} et {{ max }}.')]
    public int $pageSize = 20;
}
