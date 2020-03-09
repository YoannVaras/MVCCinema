<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Acteurs
 *
 * @author Yoann
 */
class Films
{


    private $_idFilm;
    private $_titre;
    private $_realisateur;
    private $_annee;
    private $_affiche;
    private $_roles = array();

    public function __construct(array $films)
    {
        if (isset($films['idFilm'])) {
            $this->set_idFilm($films['idFilm']);
        }
        
        $this->set_titre($films['titre']);
        $this->set_realisateur($films['realisateur']);
        $this->set_affiche($films['affiche']);
        $this->set_année($films['annee']);
        
    }

    public function get_titre()
    {
        return $this->_titre;
    }

    public function get_realisateur()
    {
        return $this->_realisateur;
    }

    public function set_titre($_titre)
    {
        $this->_titre = $_titre;
    }

    public function set_realisateur($_realisateur)
    {
        $this->_realisateur = $_realisateur;
    }

    public function get_idfilm()
    {
        return $this->_idfilm;
    }

    public function set_idfilm($_idfilm)
    {
        $this->_idfilm = $_idfilm;
    }
    public function get_affiche()
    {
        return $this->_affiche;
    }

    public function set_affiche($_affiche)
    {
        $this->_affiche = $_affiche;
    }
    public function get_année()
    {
        return $this->_année;
    }

    public function set_année($_année)
    {
        $this->_année = $_année;
    }

    public function addRole($role)
    {
        $this->_roles[] = $role;
    }

    public function get_roles()
    {
        return $this->_roles;
    }
}
