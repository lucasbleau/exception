<?php

namespace Integration\UserStories;

use App\Exceptions\MotPasseException;
use App\UserStories\CreerCompteUS;
use App\Validateurs\Validateur;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase ;

class CreateCompteUSITTest extends \PHPUnit\Framework\TestCase
{
    #[test]
    public function CreerCompteUS_MotPasseValide_True()
    {
        $validateur = new Validateur() ;
        $creerCompteUS = new CreerCompteUS($validateur) ;
        $resultat = $creerCompteUS->execute("root","azertyAZERTY123") ;
        $this->assertTrue($resultat) ;
    }

    #[test]
    public function CreerCompteUS_MotPasseInvalide_MotPasseException()
    {
        $validateur = new Validateur() ;
        $creerCompteUS = new CreerCompteUS($validateur) ;
        $this->expectException(MotPasseException::class);
        $resultat = $creerCompteUS->execute("root","azerty123") ;
        $this->assertTrue($resultat) ;
    }
}