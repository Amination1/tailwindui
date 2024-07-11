<?php
function dd($value): void
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";


    die();
}


function urlis($value): bool
{
    return $_SERVER["REQUEST_URI"] == $value;
}
