<?php

use Core\App;
use Core\Database;
use Core\User;


$user = new User;

$db = App::resolve(Database::class);

$currentUserId = $user->user()['id'];

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
