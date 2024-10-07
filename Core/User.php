<?php

namespace Core;

class User
{
    public function user()
    {
        $user = [
            'email' => $_SESSION['user']['email'],
            'password' => $_SESSION['user']['password'],
            'id' => $_SESSION['user']['id'],


        ];
        return $user;
    }
}