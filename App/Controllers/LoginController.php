<?php


namespace App\Controllers;


use Core\Controller;
use App\Models\Login;

class LoginController extends Controller
{
	private $login;

	public function __construct()
	{
		$this->login = new Login();
	}

	public function selectAuthorizedPerson($email)
	{
		return $this->login->selectAuthorizedPerson($email);
	}

	public function checkEmptyFields($email, $password)
	{
		$empty_fields = [];

		if (empty($email)) {
			$empty_fields[] = 'pole email nesmie byt prazdne';
		}

		if (empty($password)) {
			$empty_fields[] = 'pole heslo nesmie byt prazdne';
		}

			return $empty_fields;
	}

	public function checkLoginData($email, $password)
	{
		$errors = [];
		$authorized_person = $this->selectAuthorizedPerson($email);

		if (empty($authorized_person)) {
			$errors[] = 'nespravny email';
		}

		if (!empty($authorized_person) && $authorized_person['password'] !== $password) {
			$errors[] = 'nespravne heslo';
		}

			return $errors;

	}


}