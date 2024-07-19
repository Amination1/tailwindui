<?php
$config = require "config.php";
$db = new Database($config['database']);

$banner = "Note";
$currentuserid = 1;


$note = $db->query('select * from notes where id = :id', [
    'id' =>  $_GET['id'],
])->findOrFail();



if ($note['user_id'] != $currentuserid){
    abort(RESPONSE::FORBIDDEN);
}

require 'view/note.view.php';