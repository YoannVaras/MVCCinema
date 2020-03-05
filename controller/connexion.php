<?php
if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))) {
    //On affiche le template Twig correspondant
        echo $twig->render('creer_film.html.twig');
    }
 else {
     echo "toto";
    echo $twig->render('erreur.html.twig');
}