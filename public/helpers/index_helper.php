<?php
require_once '../../vendor/autoload.php';

use App\Controllers\Topic\CommentsController;
use App\Controllers\Topic\ResponsesController;

$comments  = new CommentsController();
$responses = new ResponsesController();

if (isset($_POST['submit-article-comment'])) {
	$comments->insertComment($_POST['comment-author'], $_POST['topic-id'], $_POST['comment-email'], $_POST['comment']);
}

//if (isset($_POST['submit-comment-response'])) {
//
//	$responses->insertCommentResponse($_POST['comment-id'], $_POST['comment-response'], $_POST['author-response'],
//		$_POST['topic-id']);
//}

if (isset($_POST['delete-comment'])) {
	$responses->deleteResponsesByCommentId($_POST['comment-id']);
	$comments->deleteComment($_POST['comment-id']);

}

if (isset($_POST['delete-response'])) {
	$responses->deleteResponse($_POST['response-id'], $_POST['comment-id']);
}

if (isset($_POST['ajax-response-id'])) {
	$responses->ajaxDeleteResponse($_POST['ajax-response-id']);
}

if (isset($_POST['ajax-comment-author']) && isset($_POST['ajax-comment-email'])
	&& isset($_POST['ajax-comment-text']) && isset($_POST['ajax-topic-id'])) {
	$comments->ajaxInsertComment($_POST['ajax-comment-author'], $_POST['ajax-topic-id'], $_POST['ajax-comment-email'], $_POST['ajax-comment-text']);
}

if (isset($_POST['ajax-comment-id']) && !isset($_POST['ajax-response-text'])) {
	$responses->deleteResponsesByCommentId($_POST['ajax-comment-id']);
	$comments->deleteComment($_POST['ajax-comment-id']);
}

if (isset($_POST['ajax-response-author']) && isset($_POST['ajax-response-text']) &&
	isset($_POST['ajax-comment-id']) && isset($_POST['ajax-topic-id'])) {
	$responses->insertCommentResponse($_POST['ajax-comment-id'], $_POST['ajax-response-text'], $_POST['ajax-response-author'], $_POST['ajax-topic-id']);
//	require '../partials/index/responses.php';
}