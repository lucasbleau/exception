<?php

namespace App\UserStories;


use App\Validateurs\Validateur;

class CreerCompteUS
{
    private Validateur $validateur ;

    public function __construct(Validateur $validateur)
    {
        $this->validateur = $validateur ;
    }

    public function execute(string $login, string $motPasse) : bool
    {
        // Le login est-il unique ?
        // Le mot de passe est-il valide ?
        $this->validateur->VerifierMotPasse($motPasse) ;
        // creer l'utilisateur dans le BDD
        return true;
    }
}