<?php

class Role
{

    private $_idRole,
            $_personnage, 
            $_acteur;


    public function __construct(int $_idRole = null,string $_personnage, Acteurs $_acteur)
    {

        $this->set_idRole($_idRole);
        $this->set_personnage($_personnage);
        $this->set_acteur($_acteur);
    }

    public function get_personnage()
    {
        return $this->_personnage;
    }

    public function set_personnage($_personnage)
    {
        $this->_personnage = $_personnage;
    }

    public function get_idRole()
    {
        return $this->_idRole;
    }

    public function set_idRole($_idRole)
    {
        $this->_idRole = $_idRole;
    }

    public function get_acteur()
    {
        return $this->_acteur;
    }

    public function set_acteur($_acteur)
    {
        $this->_acteur = $_acteur;

        return $this;
    }
}