<?php

session_start();

session_destroy();

$password = 'password';

echo sha1($password);

?>