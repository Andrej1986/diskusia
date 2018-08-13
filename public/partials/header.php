<?php
require_once '../vendor/autoload.php';

use App\Controllers\Topic\CommentsController;
use App\Controllers\Topic\ResponsesController;
use App\Controllers\TopicsController;
use App\Authenticated;

session_start();

$comments      = new CommentsController();
$responses     = new ResponsesController();
$topics        = new TopicsController();
$authendicated = new Authenticated();


$protected_sites = ['/admin.php', '/logout.php'];
foreach ($protected_sites as $protected_site) {
	if ($protected_site === $_SERVER['REQUEST_URI']) {
		$authendicated->admin() ? '' : $authendicated->redirect('/index.php');
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bundle.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>
<body>
<nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/index.php' || $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>">
                    <a class="nav-link" href="/index.php">Domov <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/topics.php' ? 'active' : '' ?>">
                    <a class="nav-link" href="/topics.php">Temy <span class="sr-only">(current)</span></a>
                </li>
				<?php if (!$authendicated->admin()): ?>
                    <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/login.php' ? 'active' : '' ?>">
                        <a class="nav-link" href="/login.php">Login</a>
                    </li>
				<?php endif; ?>

				<?php if ($authendicated->admin()): ?>
                    <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/logout.php' ? 'active' : '' ?>">
                        <a class="nav-link disabled" href="/logout.php">Logout</a>
                    </li>
				<?php endif; ?>
            </ul>
        </div>
    </nav>
</nav>
