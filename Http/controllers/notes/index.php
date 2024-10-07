<?php

use Core\App;
use Core\Database;
use Core\User;

$user = new User;

$db = App::resolve(Database::class);
$notes = $db->query('select * from notes where user_id = :id',[
    'id' => $user->user()['id']

])->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);