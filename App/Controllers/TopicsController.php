<?php

namespace App\Controllers;

use App\Models\Topics;
use Core\Controller;

class TopicsController extends Controller
{
	private $topics;

	public function __construct()
	{
		$this->topics = new Topics();
	}

	public function insertTopic($topic_name, $comments = 0)
	{
		$this->topics->insertTopic($topic_name, $comments);

		$this->redirect('/topics.php');
	}

	public function selectAllTopics()
	{
		return $this->topics->selectAllTopics();
	}

	public function selectTopicById($id)
	{
		return $this->topics->selectTopicById($id);
	}

	public function deleteTopic($id)
	{
		$this->topics->deleteTopic($id);
		$this->redirect('/topics.php');

	}

	public function ajaxDeleteTopic($id)
	{
		$this->topics->deleteTopic($id);
	}


	public function increaseATopicComment($topic_id)
	{
		 $increased_comments = ((int)$this->topics->selectTopicCommentsById($topic_id)['comments']) + 1;
		 $this->topics->updateTopicCommentsById($topic_id, $increased_comments);
	}

	public function decreaseATopicComment($topic_id)
	{
		 $increased_comments = ((int)$this->topics->selectTopicCommentsById($topic_id)['comments']) - 1;
		 $this->topics->updateTopicCommentsById($topic_id, $increased_comments);
	}

}