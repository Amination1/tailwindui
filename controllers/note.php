<?php
$config = require "config.php";
$db = new Database($config['database']);

$banner = "Note";
$currentuserid = 1;


$note = $db->query('select * from notes where id = :id', [
    'id' =>  $_GET['id'],
])->findOrFail();


authorized($note['user_id'] == $currentuserid);

require 'view/note.view.php';