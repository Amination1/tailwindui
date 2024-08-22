<?php

use Core\App;
use Core\Authenticator;
use Core\Session;
use Core\Validator;
use Http\Forms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm;


if ($form->validate($email, $password)) {
    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No matching account found for that email address and password.');
}

//$_SESSION['_flash']['errors'] = $form->errors();

Session::flash('errors', $form->errors());

return redirect('/login');

//return view('session/create.view.php', [
//    'errors' => [
//        'email' => 'No matching account found for that email address and password.'
//    ]
//]);







