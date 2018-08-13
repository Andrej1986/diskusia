<?php
require_once '../../vendor/autoload.php';

use App\Controllers\LoginController;

$login = new LoginController();
session_start();



if (isset($_POST['submit-login-data'])) {

	$email    = $_POST['email']??'';
	$password = $_POST['password']??'';


	if (empty($email) || empty($password)){

		$empty_fileds = $login->checkEmptyFields($email, $password);

		$_SESSION['empty-fields'] = $empty_fileds;
		$_SESSION['empty-fields'];


		$login->redirect('/login.php');
	}



	if ($login_errors = $login->checkLoginData($email, $password)){
		$_SESSION['login-errors'] = $login_errors;

		$login->redirect('/login.php');
	}


	$_SESSION['admin'] = true;
	$login->redirect('/topics.php');


}


