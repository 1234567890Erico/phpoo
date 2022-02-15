<?php

class Animal
{
    protected function deplacement()
    {
        return "je me déplace";
    }

    public function manger()
    {
        return "Je mange chaque jour";
    }
}

class Elephant extends Animal 
{

    public function quiSuisJe()
    {
        // appel des méthodes issues de la classe Animal ( héritage : deplacement() et manger() )
        return "Je suis un Elephant et " . $this->deplacement() . " comme un éléphant ! " . $this->manger() . " des fougères.";
    }

}

class Panthere extends Animal
{

    public function quiSuisJe()
    {
        return "Je suis une Panthère et " . $this->deplacement() . " comme une panthère ! " . Animal::manger() . " des girafes."; 
    }

    public function manger() // redéfinition de méthode
    // Lorsque l'on appel une méthode sur un objet, l'interpréteur php va d'abord chercher dans la class dont est issue l'objet avant d'aller dans la classe mère (en cas d'héritage)
    {
        return "Je mange deux fois par jour";
    }

}

$elephant = new Elephant;
echo '<pre>'; print_r(get_class_methods($elephant)); echo '</pre>';
echo "Elephant : " . $elephant->quiSuisJe() . '<hr>';
echo "Elephant : " . $elephant->manger() . '<hr>';
// echo "Elephant : " . $elephant->deplacement() . '<hr>'; // ⚠ Erreur ! J'hérite bien de la méthode protected mais je ne peux pas l'invoquer en dehors de la classe.

$panthere = new Panthere;
echo '<pre>'; print_r(get_class_methods($panthere)); echo '</pre>';
echo "Panthère : " . $panthere->quiSuisJe() . '<hr>';
echo "Panthère : " . $panthere->manger() . '<hr>';

/*
    "extends" est un mot clé qui permet d'hériter d'une classe.
    La classe Elephant hérite de toutes les méthodes (public, protected) de la classe.
    ⚠ private n'est pas héritable.
    Toutes les méthodes de la classe Animal sont accessible directement dans la classe Elephant et la classe Panthere.
*/
