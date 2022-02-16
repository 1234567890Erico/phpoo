<?php

echo "<h2>Exception // Try-catch</h2>";

// L'avantage des exception c'est de centraliser un traitement à effectuer dans le bloc catch en cas d'erreur.
// Cette fonction à pour but de trouver la position d'un élément dans un tableau ARRAY
function recherche($tab, $elem)
{
    if(!is_array($tab))
        throw new Exception("Vous devez envoyer un ARRAY");
        // throw nous permet de nous envoyer dans le bloc catch et d'arrêter l'exécution du code
        // new Exception : va instancier la class prédéfinie Exception
    if(sizeof($tab) == 0)
        throw new Exception("Vous devez envoyer un ARRAY avec du contenu");

    $position = array_search($elem, $tab);
    return $position;
}

$pasUnArray = "Je ne suis pas un ARRAY !";
$tab = array();
$tabPerso = ['Mario', 'Luigi', 'Toad', 'Bowser', 'Yoshi', 'Peach'];

echo '<pre>'; print_r($tabPerso); echo '</pre>';


try
{
    echo "Toad se trouve à la position : " . recherche($tabPerso, 'Toad') . '<hr>';
    echo "Yoshi se trouve à la position : " . recherche($tabPerso, 'Yoshi') . '<hr>';
    echo "Mario se trouve à la position : " . recherche($tabPerso, 'Mario') . '<hr>';
    echo "Peach se trouve à la position : " . recherche($tabPerso, 'Peach') . '<hr>';
    echo "Bowser se trouve à la position : " . recherche($pasUnArray, 'Bowser') . '<hr>';
    // ❌ Erreur car ce n'est pas un tableau
    echo "Luigi se trouve à la position : " . recherche($tab, 'Luigi') . '<hr>';
    // Cette ligne n'est pas exécuter puisqu'il ya une erreur juste au dessus et nous sommes automatiquement entrer dans le bloc catch
    // Il n'y pas de raison de continuer des traitements si l'un d'entre eux dysfonctionne, car les prochains traitement étaient peut-être dépendant de celui qui dysfonctionne.
    // Exception permet de centraliser les erreurs en cas de mauvais traitement. Cela nous permet de gérer proprement les erreurs.
}
catch(Exception $e)
{
    // bloc de capture, on va attraper les exceptions "Exception" si il y'en a une qui est levée.
    // $e représente l'objet Exception
    // echo '<pre>'; print_r($e); echo '</pre>';
    // echo '<pre>'; print_r(get_class_methods($e)); echo '</pre>';
    echo '<div style="width: 400px; padding: 10px; background: #D59797; border-radius: 4px; margin: 0 auto; color: white; text-align: center;">';
    echo "❌ Erreur : " . $e->getMessage() . '<hr>❌ Dans le fichier : ' . $e->getFile() . "<hr>❌ A la ligne : " . $e->getLine();
    echo '</div>';
}

echo "<hr><hr>";

echo "<h2>PDOException</h2>";

try
{
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '');
    echo '<div style="width: 400px; padding: 10px; background: #97D5AC; border-radius: 4px; margin: 0 auto; color: white; text-align: center;">';
    echo "✅ Connexion établie avec succès !<br> Votre base de données est maintenant connectée !";
    echo "</div>";
}
catch(PDOException $e)
{
    echo '<div style="width: 400px; padding: 10px; background: #D59797; border-radius: 4px; margin: 0 auto; color: white; text-align: center;">';
    echo "❌ Erreur : " . $e->getMessage() . '<hr>❌ Dans le fichier : ' . $e->getFile() . "<hr>❌ A la ligne : " . $e->getLine() . "<hr>❌ Code : " . $e->getCode() . '<hr>';
    echo '</div>';
}


