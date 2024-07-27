<?php
function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";


    die();
}


function urlis($value): bool
{
    return $_SERVER["REQUEST_URI"] == $value;
}

function authorized($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}