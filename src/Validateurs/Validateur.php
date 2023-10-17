<?php

namespace App\Validateurs;

use App\Exceptions\MotPasseException;
use App\Exceptions\NombresException;
use PHPUnit\Logging\Exception;

class Validateur
{
    public function VerifierNombre(int $nombre) : bool
    {
        // Tester si le nombre est positif
        if ($nombre < 0)
        {
            // Lancer une exception
            throw new NombresException('Le nombre doit etre positif') ;
        }
        return true ;
    }

    public function VerifierMotPasse($motPasse) : bool
    {
        // Verifier si la longueur est sup à 8
        if (strlen($motPasse) < 8)
        {
            throw new MotPasseException("Le mot de passe doit contenir au moins 8 caractères !") ;
        }
        // Verifier si le mdp contient au moins une majuscule
        // On va utiliser une expression régulière (motif à definir, voir si le mdp à le motif)
        if (! preg_match('/[A-Z]/',$motPasse))
        {
            throw new MotPasseException("Le mot de passe doit contenir au moins une majuscule !") ;
        }
        // Verifier si le mdp contient au moins une miniscule
        if (! preg_match('/[a-z]/',$motPasse))
        {
            throw new MotPasseException("Le mot de passe doit contenir au moins une minuscule !") ;
        }
        // Verifier si le mdp contient au moins un chiffre
        if (! preg_match('/[0-9]/',$motPasse))
        {
            throw new MotPasseException("Le mot de passe doit contenir au moins un chiffre !") ;
        }

        return true;
    }

}