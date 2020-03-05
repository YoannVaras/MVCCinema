<?php

if (isset($_POST['id']))
{
$filmsDao = new filmsDAO();
$offre = $filmsDao->getOne($_POST['id']);
$status = $filmsDao->deleteOne($_POST['id']);


//On affiche le template Twig correspondant
if ($status) {
    echo $twig->render('delete_offre.html.twig', ['status' => "Delete OK", 'offre' => $offre]);
} else {
    echo $twig->render('delete_offre.html.twig', ['status' => "Erreur Delete"]);
}

}
else {
    echo $twig->render('delete_offre.html.twig');
}


