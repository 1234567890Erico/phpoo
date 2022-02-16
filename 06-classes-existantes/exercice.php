<?php

/*
        ----------------------------       
        |    Vehicule		       |     
        ----------------------------
        ----------------------------
        |demarrer()                |
        |carburant()               |
        |nombreDeTestObligatoire() |
        ----------------------------

    1. Faire en sorte de ne pas avoir d'objet Vehicule.                                     //
    2. Obligation pour la Renault et la Peugeot de posséder la même méthode demarrer().     //
    3. Obligation pour la Renault de déclarer un carburant diesel et pour la Peugeot de déclarer un carburant essence.
    4. La Renault doit effectuer 30 tests de plus qu'un véhicule de base.                   //
    5. La Peugeot doit effectuer 70 tests de plus qe'un véhicule de base.                   //
    6. Effectuer les affichages nécessaires.                                                //
*/


abstract class Vehicule
{

    final public function demarrer()
    {
        return "Je démarre";
    }

    abstract public function carburant();

    public function nombreDeTestObligatoire()
    {
        return 100;
    }
}

class Renault extends Vehicule 
{
    public function carburant()
    {
        return 'diesel';
    }

    public function nombreDeTestObligatoire()
    {
        $nb = parent::nombreDeTestObligatoire();
        $nbTestRenault = $nb + 30;
        return $nbTestRenault;
    }
}

class Peugeot extends Vehicule 
{
    public function carburant()
    {
        return 'essence';
    }

    public function nombreDeTestObligatoire()
    {
        return parent::nombreDeTestObligatoire() + 70;
    }
}

$peugeot = new Peugeot;
echo 'La peugeot peut démarrer : ' . $peugeot->demarrer() . '.<br>';
echo "La peugeot possède un carburant de type : " . $peugeot->carburant() . '.<br>';
echo "La peugeot à effectuée : " . $peugeot->nombreDeTestObligatoire() . ' tests obligatoire.<br>'; 

$renault = new Renault;
echo 'La renault peut démarrer : ' . $renault->demarrer() . '.<br>';
echo "La renault possède un carburant de type : " . $renault->carburant() . '.<br>';
echo "La renault à effectuée : " . $renault->nombreDeTestObligatoire() . ' tests obligatoire.<br>'; 