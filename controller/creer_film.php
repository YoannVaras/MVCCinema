<?php
// echo'<pre>';
// print_r($_POST);
// echo '</pre>';
$errors=array();
$message = array();



if (isset($_POST['titre']) && isset($_POST['affiche']) && isset($_POST['realisateur']) && isset($_POST['annee']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['role'])) 
{

    if (!empty($_POST['titre']) && !empty($_POST['affiche']) && !empty($_POST['realisateur']) && !empty($_POST['annee']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['role'])) 
    { 
    
       
        $filmsDao = new FilmsDAO();


        $film = new Films(array('titre' => $_POST['titre'], 'realisateur' => $_POST['realisateur'],  'affiche' => $_POST['affiche'], 'annee' => $_POST['annee'],));
        // for ($i=0; $i<count($_POST['nom']);$i++) {
            $film->addRole(new Role(null, $_POST['role'], new Acteurs(null, $_POST['nom'], $_POST['prenom'])));
        // }
        
        $status = $filmsDao->add($film);
        
        
        if ($status === 'existe') {
            $errors['creer'] = "Ce Film existe déja ! ";
           
        } 
        else {
            $message[] = "Film ajouté : " .$film->get_titre();
        }
    
    } else {
    $errors['creer'] = 'Remplissez tous les champs du formulaire';
    }
}
echo $twig->render('creer_film.html.twig',['errors' => $errors, 'message' => $message]);
