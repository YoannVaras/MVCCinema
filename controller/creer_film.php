<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// if (isset($_POST['title']) && isset($_POST['description']))
// {
// //On appelle la fonction getAll()
// $filmsDao = new FilmsDAO();
// /* @var $alloffers type */

// $film = new Films(array('title' => $_POST['title'], 'description' => $_POST['description']));

// //$film->set_title("JEE Developpeur");
// //$film->set_description("Super job de développeur");

// $status = $filmsDao->add($film);


// //On affiche le template Twig correspondant
// if ($status) {
//     echo $twig->render('creer_film.html.twig', ['status' => "Ajout OK", 'film' => $film]);
// } else {
//     echo $twig->render('creer_film.html.twig', ['status' => "Erreur Ajout"]);
// }

// }
// else {
    echo $twig->render('creer_film.html.twig');
// }