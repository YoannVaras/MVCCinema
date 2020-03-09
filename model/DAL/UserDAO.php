<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Offres
 *
 * @author 1703728
 */
class UserDAO extends Dao
{

    
    //Ajouter une inscription
    public function add($data)
    {
        $valeurs = ['email' => $data->get_email(), 'password' => $data->get_password()];
        $requete = 'INSERT INTO user(email, password) VALUES(:email, :password)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            echo "L'adresse mail existe deja dans la base de données.";
            return false;
        } else {
            return true;
        }
    }

    public function getAll($search)
    {
        $query = $this->_bdd->prepare("SELECT * FROM user");
        $query->execute();
        $users = array();

        $users = $query->fetchAll();


        return $users;
    }



    //Récupérer plus d'info sur 1 user
    public function getOne($user)
    {

        $query = $this->_bdd->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
        $query->execute(array(':email' => $user->getEmail(), ':password' => $user->getPassword()));
        $data = $query->fetch();
        $user = new Users($data['email'], $data['password']);


        return ($user);
    }
}