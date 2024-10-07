<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                    'password' => $user['password']
                ]);

                return true;
            }
        }



        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'password' => $user['password'],
            'id' => (App::resolve(Database::class)->query('select id from users where email = :email', ["email" => $user["email"]])->find())['id']

        ];


        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}