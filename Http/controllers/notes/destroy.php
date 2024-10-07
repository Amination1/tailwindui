<?php

use Core\App;
use Core\Database;
use Core\User;

$db = App::resolve(Database::class);

$user = new User();

$currentUserId = $user->user()['id'];

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();
