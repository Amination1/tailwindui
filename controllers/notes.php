<?php
$config = require "config.php";

$db = new Database($config['database']);

$banner = "Notes";

$notes = $db->query('select * from notes where user_id = 1;')->fetchAll();


require 'view/notes.view.php';