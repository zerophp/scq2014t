<?php

$config=parse_ini_file('../application/configs/settings.ini', true);
include('../application/autoload.php');
// include('../application/model/functions.php');

$bootstrap = new bootstrap($config);
$bootstrap->run();
