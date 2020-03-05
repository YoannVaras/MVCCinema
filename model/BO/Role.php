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
class Role
{

    private $_personnage;
    private $_idrole;
    private $_test;
    private $_acteur;

    public function __construct(int $idrole = null, string $personnage, Acteurs $acteur )
    {
        $this->set_idrole($idrole);
        $this->set_personnage($personnage);
        $this->set_acteur($acteur);
    }

    public function get_personnage()
    {
        return $this->_personnage;
    }
    
    public function set_personnage($_personnage)
    {
        $this->_personnage = $_personnage;
    }

    public function get_idrole()
    {
        return $this->_idrole;
    }

    public function set_idrole($_idrole)
    {
        $this->_idrole = $_idrole;
    }
        
    public function get_test()
    {
        return $this->_test;
    }

    public function set_test($_test)
    {
        $this->_test = $_test;
    }

    public function get_acteur()
    {
        return $this->_acteur;
    }


    public function set_acteur($_acteur)
    {
        $this->_acteur = $_acteur;
    }
}
