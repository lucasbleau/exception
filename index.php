<?php

require_once "./vendor/autoload.php" ;

// Appel au validateur
$validateur = new \App\Validateurs\Validateur() ;

try
{
    $validateur->VerifierNombre(-10) ;
    echo "Le nombre est positif" ;
}
catch (\App\Exceptions\NombresException $exception)
{
    echo $exception->getMessage() ;
}

