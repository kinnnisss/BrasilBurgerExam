<?php

namespace App\Enum;

enum EtatCommandeEnum: string
{
    case ENCOURS = 'ENCOURS';
    case VALIDEE = 'VALIDEE';
    case TERMINER = 'TERMINER';
    case ANNULEE = 'ANNULEE';
}
