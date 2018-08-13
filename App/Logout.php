<?php


namespace App;


use Core\Controller;

class Logout extends Controller
{
	public function logout()
	{
		unset($_SESSION['admin']);
		$this->redirect('/index.php');
	}
}