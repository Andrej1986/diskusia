<?php

namespace Core;

use App\Config;
use PDO;

class Model
{
	private function DB()
	{
		$dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charser:utf8';
		$db  = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $db;
	}

	protected function prepare_sql($sql)
	{
		$db = $this->DB();
		return $statement = $db->prepare($sql);
	}

	protected function fetch_all_assoc($statement)
	{
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	protected function fetch_assoc($statement)
	{
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}
}