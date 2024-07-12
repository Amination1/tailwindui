<?php
require "functions.php";
require "Database.php";

//require "router.php";

//connect to our database Mysql

$config = require "config.php";



$db = new Database($config['database']);

$posts = $db->query("SELECT * FROM posts")->fetchAll();

dd($posts);

