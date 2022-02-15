<?php

/*********************
---------------------       
|    Vehicule		|     
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence() |
---------------------

---------------------
|    Pompe   		|
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence() |
|donnerEssence(Vehicule $v)	|
---------------------

    1. Créer les classes ( Vehicule / Pompe )                                                                //
    2. Création d'un véhicule (objet)                                                                        //   
    3. Attribuer un nombre de litre d'essence au véhicule : 5L                                               //   
    4. Afficher le nombre de litre d'essence dans le vehicule                                                //
    5. Création d'une pompe à essence                                                                        //
    6. Attribuer un nombre de litre d'essence dans la pompe : 800L                                           //
    7. Afficher le nombre de litre d'essence dans la pompe                                                   //   
    8. La pompe donne de l'essence à la voiture en faisant le plein (voiture après passage à la pompe : 50L)
        ( utiliser l'injection de dépendance )      
    9. Afficher le nombre de litre d'essence restant dans la pompe                                           //
    10. Afficher le nombre de litre d'essence dans la voiture après le ravitaillement                        //
    11 Faire en sorte que le véhicle ne puisse pas contenir plus de 50 L d'essence                           //
    Bonus : Créer un reservoir max pour les vehicules                                                        //
    Bonus : faire en sorte que la méthode donnerEssence de la pompe prenne en compte le nombre de litre restant et ne puisse pas aller en dessous de 0 litres  
    Bonus : Créer une classe CamionCiterne, puis créer un objet camion citerne avec 1500L d'essence
    Bonus : Faire le plein de la pompe a essence

***********************/

class Vehicule 
{
    private $litresEssence;
    private $reservoirMax;

    public function setLitresEssence($litres)
    {
        if(is_int($litres))
        {
            $this->litresEssence = $litres;
        }
    }

    public function getLitresEssence()
    {
        return $this->litresEssence;
    }

    public function setReservoirMax($litres)
    {
        if(is_int($litres))
        {
            $this->reservoirMax = $litres;
        }
    }

    public function getReservoirMax()
    {
        return $this->reservoirMax;
    }
}

class Pompe 
{
    private $litresEssence;

    public function setLitresEssence($litres)
    {
        if(is_int($litres))
        {
            $this->litresEssence = $litres;
        }
    }

    public function getLitresEssence()
    {
        return $this->litresEssence;
    }

    public function donnerEssence(Vehicule $v)
    {
        if($this->getLitresEssence() < ($v->getReservoirMax() - $v->getLitresEssence()))
        {

            $v->setLitresEssence($v->getLitresEssence() + $this->getLitresEssence());
            echo "Le plein n'a pas pu être fait entièrement car il restait : " . $this->getLitresEssence() . " litres d'essence<hr>";
            $this->setLitresEssence(0);

        }
        else
        {
             //   800    -   (50 - 5)
            $this->setLitresEssence( $this->getLitresEssence() - ($v->getReservoirMax() - $v->getLitresEssence()));
            $v->setLitresEssence( $v->getLitresEssence() + ($v->getReservoirMax() - $v->getLitresEssence())  );
                     //    5                +  (50 - 5)
        }

    }
}

$voiture = new Vehicule;
$voiture->setLitresEssence(5);
$voiture->setReservoirMax(55);
echo "La voiture possède : " . $voiture->getLitresEssence() . ' litres d\'essence<hr>';

$pompe = new Pompe;
$pompe->setLitresEssence(150);
echo "La pompe possède : " . $pompe->getLitresEssence() . ' litres d\'essence<hr>';

$pompe->donnerEssence($voiture);

echo "Après ravitaillement, la voiture possède : " . $voiture->getLitresEssence() . ' litres d\'essence <hr>';
echo "Après ravitaillement, la pompe possède : " . $pompe->getLitresEssence() . ' litres d\'essence <hr>';

$voiture2 = new Vehicule;
$voiture2->setLitresEssence(2);
$voiture2->setReservoirMax(75);

$pompe->donnerEssence($voiture2);

echo "Après ravitaillement, la voiture 2 possède : " . $voiture2->getLitresEssence() . ' litres d\'essence <hr>';
echo "Après ravitaillement, la pompe possède : " . $pompe->getLitresEssence() . ' litres d\'essence <hr>';

$voiture3 = new Vehicule;
$voiture3->setLitresEssence(15);
$voiture3->setReservoirMax(60);

$pompe->donnerEssence($voiture3);

echo "Après ravitaillement, la voiture 3 possède : " . $voiture3->getLitresEssence() . ' litres d\'essence <hr>';
echo "Après ravitaillement, la pompe possède : " . $pompe->getLitresEssence() . ' litres d\'essence <hr>';
 
