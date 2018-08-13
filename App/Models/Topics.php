<?php


namespace App\Models;

use PDO;
class Topics extends \Core\Model
{
	public function insertTopic($name, $comments)
	{
		$statement = $this->prepare_sql('insert into topics(name, comments) values(:name, :comments)');

		$statement->bindValue(':name', $name, PDO::PARAM_STR);
		$statement->bindValue(':comments', $comments, PDO::PARAM_STR);

		$statement->execute();
	}

	public function selectAllTopics()
	{
		$statement = $this->prepare_sql('select * from topics order by date desc');
		return $this->fetch_all_assoc($statement);
	}

	public function selectTopicById($id)
	{
		$statement = $this->prepare_sql('select * from topics where id = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_STR);

		return $this->fetch_assoc($statement);
	}

	public function selectTopicCommentsById($id)
	{
		$statement = $this->prepare_sql('select comments from topics where id = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_STR);

		return $this->fetch_assoc($statement);
	}

	public function updateTopicCommentsById($id, $comments)
	{
		$statement = $this->prepare_sql("update topics set comments=$comments where id = :id");
		$statement->bindValue(':id', $id, PDO::PARAM_STR);

		$statement->execute();
	}

	public function deleteTopic($id)
	{
		$statement = $this->prepare_sql('delete from topics where id = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);

		$statement->execute();
	}
}