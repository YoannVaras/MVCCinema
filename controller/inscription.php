<?php

if (isset($_POST['user_signUp']))
{
    if(!empty($_POST['user_mail']) && !empty($_POST['user_password']) && !empty($_POST['user_password2']))
    {
        if ($_POST['user_password'] == $_POST['user_password2'])
        {
            $mdp = sha1($_POST['user_password']);

            $user= new User($_POST['user_mail'],$_POST['user_password']);
            $userDAO = new UserDAO();

            $result = $userDAO->add($user);
          
            if($result)
            {
                echo $twig->render('inscription.html.twig');
            }
        } else
            {
                echo $twig->render('erreur.html.twig');
                echo "Les mots de passe ne correpondent pas.";
            }
    } else
        {
            echo $twig->render('erreur.html.twig');
            echo "Veuillez remplir tout les champs.";
        }
    
}