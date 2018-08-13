<?php


namespace App;


use Core\Controller;

class Authenticated extends Controller
{

	public function admin()
	{
		$admin = $_SESSION['admin'] ?? false;

		if ($admin) {
			return true;
		}

		return false;
	}
}