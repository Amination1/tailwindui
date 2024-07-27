<?php
$banner = 'Create new note';
require 'Validator.php';


$config = require "config.php";
$db = new Database($config['database']);




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    $validator = new Validator();

    if (! Validator::string($_POST['body'],1 ,1000)) {
        $errors['body'] = 'Body is required';
    }


    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

}

require 'view/note-create.view.php';