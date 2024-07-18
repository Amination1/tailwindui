<?php
require "functions.php";
require "Database.php";

require "router.php";

//connect to our database Mysql

$config = require "config.php";



$db = new Database($config['database']);

$id = $_GET["id"];

$query = "SELECT * FROM posts where id = ?";


$posts = $db->query($query, [$id])->fetch();

dd($posts);

