<?php


namespace App\Models;


use Core\Model;
use PDO;

class Login extends Model
{
	public function selectAuthorizedPerson($email)
	{
		if (!empty($email)) {
			$statement = $this->prepare_sql('SELECT * FROM loginAdmin WHERE email = :email');
			$statement->bindValue(':email', $email, PDO::PARAM_STR);

			return $this->fetch_assoc($statement);
		}

		return '';
	}
}