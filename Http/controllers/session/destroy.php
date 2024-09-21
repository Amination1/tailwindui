<?php
use Core\Session;

Session::destroy();

//destroy();

header('location: /');
exit();