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
class User
{

    private $_iduser;
    private $_email;
    private $_password;

    public function __construct(string $email, string $password)
    {
        $this->set_email($email);
        $this->set_password($password);
    }

    public function get_email()
    {
        return $this->_email;
    }

    public function get_password()
    {
        return $this->_password;
    }

    public function set_email($_email)
    {
        $this->_email = $_email;
    }

    public function set_password($_password)
    {
        $this->_password = $_password;
    }

    /**
     * Get the value of _iduser
     */
    public function get_iduser()
    {
        return $this->_iduser;
    }

    /**
     * Set the value of _iduser
     *
     */
    public function set_iduser($_iduser)
    {
        $this->_iduser = $_iduser;

    }
}
