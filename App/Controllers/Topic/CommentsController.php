<?php


namespace App\Controllers\Topic;

use App\Controllers\TopicsController;
use \App\Models\Topic\Comments;

class CommentsController extends \Core\Controller
{
	private $comments;

	public function __construct()
	{
		$this->comments = new Comments();
	}

	public function insertComment($author, $topic_id, $email, $comment)
	{
		if (!empty($_POST['comment-author']) && !empty($_POST['topic-id']) && !empty($_POST['comment-email']) && !empty($_POST['comment'])) {
			$this->comments->insertComment($author, $topic_id, $email, $comment);
			$this->redirect('/index.php#comments');
		}

		die('fail');
	}

	public function ajaxInsertComment($author, $topic_id, $email, $comment)
	{
		(new TopicsController())->increaseATopicComment($topic_id);

		$this->comments->insertComment($author, $topic_id, $email, $comment);
			$this->redirect('/comments.php?id='.$topic_id);
	}

	public function selectAllComments()
	{
		return $this->comments->selectAllComments();
	}

	public function selectAllCommentsByTopicId($topic_id)
	{
		return $this->comments->selectAllCommentsByTopicId($topic_id);
	}

	public function deleteComment($id)
	{
		$topic_id = $this->comments->selectCommentById($id)['topic_id'];
		(new TopicsController())->decreaseATopicComment($topic_id);

		$this->comments->deleteComment($id);

		$this->redirect('/comments.php?id='.$id);
	}

	public function deleteCommentsByTopicId($topic_id)
	{
		$this->comments->deleteCommentsByTopicId($topic_id);
	}

}