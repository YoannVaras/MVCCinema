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
class Acteurs
{

    private $_idacteur;
    private $_nom;
    private $_prenom;

    public function __construct(int $idacteur = null, string $nom, string $prenom)
    {
        $this->set_idacteur($idacteur);
        $this->set_nom($nom);
        $this->set_prenom($prenom);
    }

    public function get_nom()
    {
        return $this->_nom;
    }

    public function get_prenom()
    {
        return $this->_prenom;
    }

    public function set_nom($_nom)
    {
        $this->_nom = $_nom;
    }

    public function set_prenom($_prenom)
    {
        $this->_prenom = $_prenom;
    }

    /**
     * Get the value of _idacteur
     */
    public function get_idacteur()
    {
        return $this->_idacteur;
    }

    /**
     * Set the value of _idacteur
     *
     */
    public function set_idacteur($_idacteur)
    {
        $this->_idacteur = $_idacteur;

    }
}
