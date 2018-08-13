<?php


namespace App\Models\Topic;

use PDO;

class Comments extends \Core\Model
{
	public function insertComment($author, $topic_id, $email, $comment)
	{
		$statement = $this->prepare_sql('insert into topicComments(author, topic_id, email, comment) values(:author, :topic_id, :email, :comment)');

		$statement->bindValue(':author', $author, PDO::PARAM_STR);
		$statement->bindValue(':topic_id', $topic_id, PDO::PARAM_STR);
		$statement->bindValue(':email', $email, PDO::PARAM_STR);
		$statement->bindValue(':comment', $comment, PDO::PARAM_STR);

		$statement->execute();
	}

	public function selectAllComments()
	{
		$statement = $this->prepare_sql('select * from topicComments order by date desc');
		return $this->fetch_all_assoc($statement);
	}

	public function selectCommentById($id)
	{
		$statement = $this->prepare_sql('select * from topicComments where id = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);

		return $this->fetch_assoc($statement);
	}

	public function selectAllCommentsByTopicId($topic_id)
	{
		$statement = $this->prepare_sql('select * from topicComments where topic_id = :topic_id order by date desc');
		$statement->bindValue(':topic_id', $topic_id, PDO::PARAM_INT);

		return $this->fetch_all_assoc($statement);
	}

	public function deleteComment($id)
	{
		$statement = $this->prepare_sql('delete from topicComments where id = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);

		$statement->execute();
	}

	public function deleteCommentsByTopicId($topic_id)
	{
		$statement = $this->prepare_sql('delete from topicComments where topic_id = :topic_id');
		$statement->bindValue(':topic_id', $topic_id, PDO::PARAM_INT);

		$statement->execute();
	}
}