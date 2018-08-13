<?php
require_once '../../vendor/autoload.php';

use App\Controllers\Topic\CommentsController;
use App\Controllers\Topic\ResponsesController;
use App\Controllers\TopicsController;

$topics    = new TopicsController();
$comments  = new CommentsController();
$responses = new ResponsesController();

if (isset($_POST['submit-topic'])) {
	$topics->insertTopic($_POST['topic-name']);
}

if (isset($_POST['submit-comment-response'])) {
	$responses->insertCommentResponse($_POST['comment-id'], $_POST['comment-response'], $_POST['author-response']);
}


if (isset($_GET['topic-id'])) {
	$topics->deleteTopic($_GET['topic-id']);
}

if (isset($_POST['ajax_topic_id'])) {
	$id = $_POST['ajax_topic_id'];

	$topics->ajaxDeleteTopic($id);
	$comments->deleteCommentsByTopicId($id);
	$responses->deleteResponsesByTopicId($id);
}

if (isset($_POST['ajax-topic-name'])) {
	$topics->insertTopic($_POST['ajax-topic-name']);
}

