<?php
require "functions.php";
require "Database.php";
//require "router.php";

//connect to our database Mysql


$db = new Database();

$post = $db->query("SELECT * FROM posts")->fetch(PDO::FETCH_ASSOC);

dd($post['title']);

