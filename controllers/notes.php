<?php
$banner = "My Notes";

$config = require "config.php";
$db = new Database($config['database']);


$notes = $db->query('select * from notes where user_id = 1;')->fetchAll();


require 'view/notes.view.php';