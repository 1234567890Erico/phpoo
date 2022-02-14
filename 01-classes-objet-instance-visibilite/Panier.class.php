<?php

class Panier
{
    public $nbProduit; // propriété. "public" est accessible au sein de la classe, dans les classes héritières aussi en dehors de la classe.
    protected $prenom; // propriété. "protected" est accessible au sein de la classe et aussi dans les classes héritières.
    private $mdp; // propriété. "private" est accessible uniquement au sein de la classe ou elle à été déclarée. 

    public function ajouterArticle()
    {
        return "L'article à bien été ajouté<hr>";
    }

    protected function retirerArticle()
    {
        return "L'article à bien été retirer<hr>";
    }

    private function affichageArticle()
    {
        return "Voici les articles<hr>";
    }
}

$panier1 = new Panier;
echo '<pre>'; print_r($panier1); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($panier1)); echo '</pre>';

$panier1->nbProduit = 10;
echo '<pre>'; print_r($panier1); echo '</pre>';
echo 'Nombre de produit(s) : ' . $panier1->nbProduit . '<hr>';

echo $panier1->ajouterArticle();

// echo $panier1->retirerArticle(); // ne fonctionne pas car la méthode retirerArticle() est protected
// echo $panier1->affichageArticle(); // ne fonctionne pas car la méthode affichageArticle() est private

$panier2 = new Panier;
echo '<pre>'; print_r($panier2); echo '</pre>';

$panier2->nbProduit = 5;
echo '<pre>'; print_r($panier2); echo '</pre>';

/*
    Une classe est un plan de construction, un modèle qui nous permet de regrouper des données, des informations sur un même sujet.
    Pour exploiter ce qui est déclaré dans la classe, nous devons créer une instance, un objet issu de la classe grâce au mot clé 'new' 
    Le mot clé 'new' permet de créer un exemplaire de la classe à travers l'objet ($panier1, $panier2).

    Niveau de visibilité :
        public : accessible de partout, dans la classe, dans les classes héritières et depuis l'extérieur de la classe (depuis l'objet)
        protected : accessible dans la classe ou cela à été déclaré et aussi dans les classes héritières
        private : accessible uniquement dans la classe ou cela à été déclaré 

    Divers : 
        new est un mot clé permettant d'effectuer une instanciation
        une classe peut produire plusieurs objets. Nous pouvons donc effectuer plusieurs instanciation avec "new"
    
    Les niveaux de visibilité permettent de protéger les données des classes, et de ne pas pouvoir injecter n'importe quelle données directement dans les propriétées et les méthodes des classes.

    Quand vous instanciez une classe, la variable stockant l'objet, en faite ne stocke pas l'objet lui-même.
    En faite elle stcoke un identifiant qui représente cet objet.
*/
