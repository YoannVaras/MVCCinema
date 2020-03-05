<?php
//On affiche le template Twig correspondant
$_SESSION['username'] = 'User test';

echo $twig->render('header.html.twig');
