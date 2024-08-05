<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['database']);

$currentuserid = 1;


$note = $db->query('select * from notes where id = :id', [
    'id' =>  $_GET['id'],
])->findOrFail();


authorized($note['user_id'] == $currentuserid);



view('notes/show.view.php', [
    'banner' => 'Note',
    'note' => $note,
]);