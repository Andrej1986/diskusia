<?php
require_once '../vendor/autoload.php';
session_start();

use App\Logout;

$logout = new Logout();

$logout->logout();