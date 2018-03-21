<?php

$pdo = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "blog", "MgCTCN3EPwdngQCi");
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
