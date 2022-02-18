<?php

namespace controller;

class Controller 
{
    private $dbEntityRepository;


    public function __construct()
    {
        $this->dbEntityRepository = new \model\EntityRepository;
    }

    // Méthode permettant le pilotage de notre application
    public function handleRequest()
    {
        // On stocke la valeur de l'indice "op" transmit dans l'url
        $op = isset($_GET['op']) ? $_GET['op'] : NULL;

        try
        {
            // Ces conditions permettent de savoir ce que demande l'internaute, l'action que cela va entrainer.
            // Exemple : Si l'internaute clique sur "ajout employé", dans le controller cela exécutera la méthode save() qui permettra d'insérer un nouvel employé dans la Base de données

            //  ?op=add          ?op=update    
            if($op == 'add' || $op == 'update')
                $this->save();             // si on ajoute ou modifie un employé, la méthode save() sera exécutée
            elseif($op == 'select')
                $this->select();           // si on sélectionne un employé, la méthode select() sera exécutée
            elseif($op == 'delete')
                $this->delete();           // si on supprime un employé, la méthode delete() sera exécutée
            elseif($op == 'action')
                $this->selectAllAction();  // si on supprome un employé, la méthode selectAllAction() nous affichera un message de confirmation
            else
                $this->selectAll();        // Dans les autres cas, nous voulons afficher l'ensemble des employés, la méthode selectAll() sera exécutée
        }
        catch(\Exception $e)
        {
            echo "❌ Une erreur est survenue : " . $e->getMessage();
        }

    }

    // Méthode permettant de construire une vue (une page de notre application)
    public function render($layout, $template, $parameters = array())
    {
        // extract() : fonction prédéfinie qui permet d'extraire chasue indice d'un ARRAY sous forme de variable
        extract($parameters); // $parameters['employes'] ---> $employes
        // permet de faire une mise en tampon, on commence à garder en mémoire de la données
        ob_start();
        // Cette inclusion sera stockée directement dans la variable $content
        require_once "view/$template";
        // ici on va stocker la mise en mémoire, c'est ç dire que l'on stock dans la variable $content, le template lui-même
        $content = ob_get_clean();
        // On temporise la sortie d'affichage
        ob_start();
        // On inclue le layout qui est le gabarit de base (header/nav/footer)
        require_once "view/$layout";
        // ob_end_flush() va tous libérer et fait tout apparître dans le navigateur
        // Envoi les données de la mise en mémoire
        // Mise en tampon de sortie
        return ob_end_flush();
    }

    // Méthode permettant d'afficher tous les employés
    public function SelectAll()
    {
        $this->render('layout.php', 'affichage-employes.php', [
            'title' => 'Affichage de tous les employes',
            'data' => $this->dbEntityRepository->selectAllEntityRepo(),
            'fields' => $this->dbEntityRepository->getFields(),
            'id' => 'id_' . $this->dbEntityRepository->table,
            'message' => "Ci-dessous vous trouverez un tableau contenant l'ensemble des employés de l'entreprise"
        ]);
    }

}