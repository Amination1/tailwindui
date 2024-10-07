<?php

use Core\App;
use Core\User;
use Core\Validator;
use Core\Database;


$user = new User;

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::string($_POST['body'], 1, 10000)) {
    $errors['body'] = 'A body of no more than 10,000 characters is required.';
}

if (! Validator::string($_POST['name'], 1, 100)) {
    $errors['name'] = 'A name of no more than 100 characters is required.';
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(name, body, user_id) VALUES(:name, :body, :user_id)', [
    'name' => $_POST['name'],
    'body' => $_POST['body'],
    'user_id' => $user->user()['id']
]);



header('location: /notes');
die();
