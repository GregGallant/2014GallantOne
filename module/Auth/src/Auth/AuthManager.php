<?php

namespace Auth;

class AuthManager {


    public function __construct($sm)
    {
        $this->authDao = new AuthTable($sm);
    }

    public function getUser($email)
    {
        return $this->authDao->getUserByEmail($email);
    }

    public function setUser($user)
    {
        $this->authDao->saveUser($user);
    }
}
