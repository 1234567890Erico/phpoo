<?php

require_once 'autoload.php';


$a = new A;
$b = new B;
$c = new C;
$d = new D;

/*
    Si nous nous servons de 120 classes, il faudra 120 require/include. 
    L'avantage de l'autoload est qu'il permet d'inclure nos classes automatiquement.
*/