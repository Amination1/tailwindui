<?php

use Core\App;
use Core\Database;
use Core\User;
use Core\Validator;

$db = App::resolve(Database::class);

$user = new User;

$currentUserId = $user->user()['id'];

// find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

// validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 10000)) {
    $errors['body'] = 'A body of no more than 10,000 characters is required.';
}

// if no validation errors, update the record in the notes database table.
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body, name = :name where id = :id', [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'body' => $_POST['body']
]);

// redirect the user
header('location: /notes');
die();
