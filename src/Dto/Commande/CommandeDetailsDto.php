<?php

namespace App\Dto\Commande;

class CommandeDetailsDto
{
    public CommandeHeaderDto $header;
    public ClientInfoDto $client;

    /** @var LigneCommandeDto[] */
    public array $lignes = [];

    public ?PaiementDto $paiement = null;

    public CommandeActionsDto $actions;

    /**
     * @param LigneCommandeDto[] $lignes
     */
    public function __construct(
        CommandeHeaderDto $header,
        ClientInfoDto $client,
        array $lignes,
        ?PaiementDto $paiement,
        CommandeActionsDto $actions
    ) {
        $this->header = $header;
        $this->client = $client;
        $this->lignes = $lignes;
        $this->paiement = $paiement;
        $this->actions = $actions;
    }
}
