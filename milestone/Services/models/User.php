<?php

class User
{
    private $id;
    private $first;
    private $last;
    private $email;
    private $username;
    private $password;
    private $admin;

    public function __construct($first, $last, $email, $username, $password, $admin)
    {
        $this->first = $first;
        $this->last = $last;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->admin = $admin;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getFirst()
    {
        return $this->first;
    }

    public function setFirst($first)
    {
        $this->first = $first;
    }

    public function getLast()
    {
        return $this->last;
    }

    public function setLast($last)
    {
        $this->last = $last;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }
}