<?php

use Illuminate\Support\Collection;

require __DIR__.'/../'.'vendor/autoload.php';


$numbers = new collection([
    0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
]);

echo "<pre>";
var_dump($numbers);
echo "</pre>";