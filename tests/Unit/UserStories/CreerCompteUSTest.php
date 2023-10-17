<?php

namespace Tests\Unit\UserStories;

use App\Exceptions\MotPasseException;
use App\UserStories\CreerCompteUS;
use App\Validateurs\Validateur;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CreerCompteUSTest extends TestCase
{

    #[test]
    public function CreerCompteUS_MotPasseValide_True()
    {
        // Arrange
            // "Mocker" la classe validateur
            $validateurMock = $this->createMock(Validateur::class) ;
            // Simuler le resultat de la methode VerifierMotPasse
            $validateurMock->method("VerifierMotPasse")
                           ->willReturn(true) ;
        $creerCompteUS = new CreerCompteUS($validateurMock) ;
        // Act
        $resultat = $creerCompteUS->execute("root","azertyAZERTY123") ;
        // Assert
        $this->assertTrue($resultat) ;
    }

    #[test]
    public function CreerCompteUS_MotPasseInvalide_MotPasseException()
    {
        // Arrange
        // "Mocker" la classe validateur
        $validateurMock = $this->createMock(Validateur::class) ;
        // Simuler le resultat de la methode VerifierMotPasse
        $validateurMock->method("VerifierMotPasse")
            ->will($this->throwException(new MotPasseException)) ;
        $creerCompteUS = new CreerCompteUS($validateurMock) ;
        $this->expectException(MotPasseException::class);
        // Act
        $resultat = $creerCompteUS->execute("root","azerty123") ;
        // Assert
       $this->assertTrue($resultat) ;
    }
}