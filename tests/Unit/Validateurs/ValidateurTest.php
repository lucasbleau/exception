<?php

namespace Tests\Unit\Validateurs ;

use App\Exceptions\NombresException;
use App\Exceptions\MotPasseException ;
use App\Validateurs\Validateur;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ValidateurTest extends TestCase
{
    #[test]
    public function verifierNombre_NombrePositif_True()
    {
        // Arrange
        $validateur = new Validateur();
        // Act
        $resultat = $validateur ->VerifierNombre(10);
        // Assert
        $this->assertTrue($resultat);
    }

    #[test]
    public function verifierNombre_NombreNegatif_NombreException()
    {
        // Arrange
        $validateur = new Validateur();
        $this->expectException(NombresException::class);
        $this->expectExceptionMessage("Le nombre doit etre positif");
        // Act
        $resultat = $validateur ->VerifierNombre(-10);
        // Assert
        $this->assertTrue($resultat);
    }

    #[test]
    public function verifierMotPasse_Moins8Caracteres_MotPasseException()
    {
        $validateur = new Validateur();
        $this->expectException(MotPasseException::class);
        $this->expectExceptionMessage("Le mot de passe doit contenir au moins 8 caractères !");
        $resultat = $validateur->VerifierMotPasse("azerty") ;
        $this->assertTrue($resultat);
    }

    #[test]
    public function verifierMotPasse_PasMajuscule_MotPasseException()
    {
        $validateur = new Validateur();
        $this->expectException(MotPasseException::class);
        $this->expectExceptionMessage("Le mot de passe doit contenir au moins une majuscule !");
        $resultat = $validateur->VerifierMotPasse("azertyazerty") ;
        $this->assertTrue($resultat);
    }

    #[test]
    public function verifierMotPasse_PasMinuscule_MotPasseException()
    {
        $validateur = new Validateur();
        $this->expectException(MotPasseException::class);
        $this->expectExceptionMessage("Le mot de passe doit contenir au moins une minuscule !");
        $resultat = $validateur->VerifierMotPasse("AZERTYAZERTY") ;
        $this->assertTrue($resultat);
    }

    #[test]
    public function verifierMotPasse_PasChiffre_MotPasseException()
    {
        $validateur = new Validateur();
        $this->expectException(MotPasseException::class);
        $this->expectExceptionMessage("Le mot de passe doit contenir au moins un chiffre !");
        $resultat = $validateur->VerifierMotPasse("azertyAZERTY") ;
        $this->assertTrue($resultat);
    }

    #[test]
    public function verifierMotPasse_MotPasseValide_True()
    {
        // Arrange
        $validateur = new Validateur();
        // Act
        $resultat = $validateur ->VerifierMotPasse("azertyAZERTY39");
        // Assert
        $this->assertTrue($resultat);
    }
}
