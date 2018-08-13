<?php


namespace App\Models\Topic;

use PDO;

class Responses extends \Core\Model
{
	public function insertCommentResponse($comment_id, $response, $response_author, $topic_id)
	{
		$statement = $this->prepare_sql('insert into commentResponses(comment_id, response, response_author, topic_id) values(:comment_id, :response, :response_author, :topic_id)');

		$statement->bindValue(':comment_id', $comment_id, PDO::PARAM_STR);
		$statement->bindValue(':response', $response, PDO::PARAM_STR);
		$statement->bindValue(':response_author', $response_author, PDO::PARAM_STR);
		$statement->bindValue(':topic_id', $topic_id, PDO::PARAM_STR);

		$statement->execute();
	}

	public function selectAllCommentResponses()
	{
		$statement = $this->prepare_sql('select * from commentResponses order by date desc');
		return $this->fetch_all_assoc($statement);
	}

	public function selectCommentResponsesByCommentId($comment_id)
	{
		$statement = $this->prepare_sql('select * from commentResponses where comment_id = :comment_id order by date desc');
		$statement->bindValue(':comment_id', $comment_id, PDO::PARAM_INT);

		return $this->fetch_all_assoc($statement);
	}

	public function deleteResponse($id)
	{
		$statement = $this->prepare_sql('delete from commentResponses where id = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);

		$statement->execute();
	}

	public function deleteResponsesByCommentId($comment_id)
	{
		$statement = $this->prepare_sql('delete from commentResponses where comment_id = :comment_id');
		$statement->bindValue(':comment_id', $comment_id, PDO::PARAM_INT);

		$statement->execute();
	}

	public function deleteResponsesByTopicId($topic_id)
	{
		$statement = $this->prepare_sql('delete from commentResponses where topic_id = :topic_id');
		$statement->bindValue(':topic_id', $topic_id, PDO::PARAM_INT);

		$statement->execute();
	}
}