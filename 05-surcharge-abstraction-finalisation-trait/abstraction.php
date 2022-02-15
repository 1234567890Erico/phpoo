<?php

abstract class Joueur
{
    protected $ageJoueur;

    public function setAgeJoueur($age)
    {
        $this->ageJoueur = $age;
    }

    public function getAgeJoueur()
    {
        return $this->ageJoueur;
    }
    public function seConnecter()
    {
        if($this->getAgeJoueur() < $this->etreMajeur())
        {
            return "Vous devez être majeur pour jouer à ce jeux ! Age requis : " . $this->etreMajeur() . " ans";
        }
        else
        {
            return "Vous êtes maintenant connecter au serveur de jeux !";
        }
    }
    abstract public function etreMajeur();
    abstract public function devise();
}

// $joueur = new Joueur;

class JoueurFr extends Joueur
{

    public function etreMajeur()
    {
        return 18;
    }

    public function devise()
    {
        return " euro €";
    }
}

class JoueurUSA extends Joueur
{
    public function etreMajeur()
    {
        return 21;
    }

    public function devise()
    {
        return " dollar $";
    }
}

$joueurFr = new JoueurFr;
$joueurFr->setAgeJoueur(25);
echo '<pre>'; print_r(get_class_methods($joueurFr)); echo '</pre>';
echo "Age pour jouer depuis la France : " . $joueurFr->etreMajeur() . ' ans<hr>';
echo "Devise pour jouer depuis la France : " . $joueurFr->devise()  . '<hr>';
echo $joueurFr->seConnecter();

$joueurUSA = new JoueurUSA;
$joueurUSA->setAgeJoueur(15);
echo '<pre>'; print_r(get_class_methods($joueurUSA)); echo '</pre>';
echo $joueurUSA->seConnecter();

/*
    Une class abstraite n'est pas instanciable.
    Les méthodes abstraites n'ont pas de contenu (no body).
    Lorsque l'on hérite de méthodes abstraites, nous sommes obligés de les redéfinir.
    Pour avoir des méthodes abstraites, il est nécessaire que la classe qui les contient soit abstraite.
    Une class Abstraite peut contenir des méthodes normale.

    Le développeur qui écrit une classe abstraite est au coeur de l'application et va obliger les autres développeurs à redéfinir la méthode êtreMajeur() et devise() car non seulement elle est abstraite mais en plus elle est exécutée dans la méthode seConnecter().
    Le développeur impose une contrainte (saine).
*/
