<?php if (!empty($responses->selectCommentResponsesByCommentId($comment['id']))): ?>
    <div class="responses">
    <h6>Reakcie</h6>
<?php endif; ?>

    <div id="all-responses-<?= $comment['id'] ?>">
		<?php if (!empty($responses->selectCommentResponsesByCommentId($comment['id']))): ?>
			<?php foreach ($responses->selectCommentResponsesByCommentId($comment['id']) as $response): ?>
                <div id="the-response-<?= $response['id'] ?>">
                    <div class="response-author-and-date">
                        <u>
                        <span><i>Napísal: <?= htmlspecialchars($response['response_author']) ?>
                                , &nbsp;</i></span>

                            <span> <?= date("m.d.Y", strtotime($response['date'])); ?></span>
                        </u>
                    </div>
                    <p><?= htmlspecialchars($response['response']) ?></p>

					<?php if ($authenticated->admin()): ?>
                        <form class="delete-response" method="post" action="helpers/index_helper.php">
                            <input type="hidden" name="comment-id" value="<?= $response['comment_id'] ?>">
                            <input type="hidden" name="response-id" value="<?= $response['id'] ?>">
                            <button onclick="Response.deleteResponse(event)" class="btn btn-sm" type="submit"
                                    name="delete-response">Vymazať Reakciu
                            </button>
                        </form>
					<?php endif; ?>

                    <hr>
                </div>
			<?php endforeach; ?>
		<?php endif; ?>
    </div>
<?php if (!empty($responses->selectCommentResponsesByCommentId($comment['id']))): ?>

    </div>
<?php endif; ?>