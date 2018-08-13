<?php


namespace App\Controllers\Topic;

use \App\Models\Topic\Responses;

class ResponsesController extends \Core\Controller
{
	public $responses;

	public function __construct()
	{
		$this->responses = new Responses();
	}

	public function insertCommentResponse($comment_id, $response, $response_author, $topic_id)
	{
		$this->responses->insertCommentResponse($comment_id, $response, $response_author, $topic_id);
		$this->redirect('/comments.php?id='.$topic_id);
	}

	public function selectAllCommentResponses()
	{
		return $this->responses->selectAllCommentResponses();
	}

	public function selectCommentResponsesByCommentId($id)
	{
		return $this->responses->selectCommentResponsesByCommentId($id);
	}

	public function deleteResponse($id, $comment_id)
	{
		$this->responses->deleteResponse($id);

		$redirect_string = '/index.php#the-comment-' . $comment_id;
		$this->redirect($redirect_string);

	}

	public function ajaxDeleteResponse($id)
	{
		$this->responses->deleteResponse($id);
		$this->redirect('/comments.php');

	}

	public function deleteResponsesByCommentId($comment_id)
	{
		$this->responses->deleteResponsesByCommentId($comment_id);
	}

	public function deleteResponsesByTopicId($topic_id)
	{
		$this->responses->deleteResponsesByTopicId($topic_id);
	}
}