<?php require 'partials/header.php';

use App\Authenticated;

$authenticated = new Authenticated();
?>

<div class="container" id="home">
    <h2><?= htmlspecialchars($topics->selectTopicById($_GET['id'])['name']) ?></h2>

    <hr>
    <h4 id="comments">Komentáre</h4>
    <div class="all-comments">
        <div id="all-comments">
			<?php foreach ($comments->selectAllCommentsByTopicId($_GET['id']) as $comment): ?>
                <div class="comment" id="the-comment-<?= $comment['id']; ?>">
                    <div class="the-comment"><?= htmlspecialchars($comment['comment']) ?></div>

                    <div class="author-and-date">

                        <span>Napísal/a: <?= htmlspecialchars($comment['author']) ?>, &nbsp;</span>

                        <span> <?= date("m.d.Y", strtotime($comment['date'])); ?></span>
                        <div><?= htmlspecialchars($comment['email']) ?></div>
                    </div>

					<?php
					require 'partials/index/add_response.php';
					require 'partials/index/responses.php';
					?>

                </div>
                <div id="delete-comment-form-<?= $comment['id']; ?>">
					<?php if ($authenticated->admin()): ?>
                        <form class="delete-comment float-left" method="post" action="helpers/index_helper.php">
                            <input type="hidden" name="comment-id" value="<?= $comment['id'] ?>">
                            <button onclick="Comment.deleteComment(event)" class="btn btn-secondary" type="submit"
                                    name="delete-comment">Vymazať Komentár
                            </button>
                        </form>
					<?php endif; ?>

                    <div class="clearfix"></div>

                    <hr>
                </div>
			<?php endforeach; ?>
        </div>
    </div>

	<?php require 'partials/index/add_comment.php' ?>
</div>

<?php require 'partials/footer.php'; ?>
