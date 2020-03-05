<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$filmsDao = new FilmsDAO();

if (isset($_POST['search']))
{
    $search = $_POST['search'];
}
else
{
    $search = '';
}

//On appelle la fonction getAll()
$allFilms = $filmsDao->getAll($search);
// var_dump($allFilms);

if(count($allFilms) == 0) 
{
    $error = "Aucun film, dommage !";
    echo $twig->render('films.html.twig', ['allFilms' => $allFilms, 'error' => $error]);
}
elseif(count($allFilms) == 1) 
{
    $oneFilm = "";
    echo $twig->render('films.html.twig', ['allFilms' => $allFilms, 'oneFilm' => $oneFilm]);
}
else 
{
    //On affiche le template Twig correspondant
    echo $twig->render('films.html.twig', ['allFilms' => $allFilms]);
}



