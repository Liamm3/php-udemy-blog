<?php

$password = "test";

$hash = password_hash($password, PASSWORD_DEFAULT);

echo $hash;
var_dump(password_verify($password, $hash));