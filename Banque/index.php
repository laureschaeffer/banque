<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

$LS= new Titulaire("SCHAEFFER", "Laure", "2000-01-15", "Strasbourg");
$livA= new Compte("Livret A", 500, "€", $LS);
$compteCourant= new Compte("Compte courant", 100, "€", $LS);

echo $LS->afficherCompte();

echo $livA;