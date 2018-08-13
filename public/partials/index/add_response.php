<div class="comment-response-form">
    <input type="hidden" value="<?= $comment['id'] ?>">
    <p onclick="Response.toggleResponseForm(event)">Napíšte reakciu</p>
    <div id="response-form-<?= $comment['id'] ?>" class="hide">
        <form action="helpers/index_helper.php" method="post">
            <div class="form-group">
                <h6><label for="comment-response"></label></h6>

                <div class="form-group">
                    <label for="author-response-<?= $comment['id'] ?>"></label>
                    <input class="form-control col-sm-6 col-md-3" type="text" name="author-response"
                           id="author-response-<?= $comment['id'] ?>"
                           required placeholder="Autor reakcie">
                </div>
                <textarea class="form-control col-md-4" name="comment-response"
                          id="comment-response-<?= $comment['id'] ?>" rows="1" required
                          placeholder="Tu napíšte reakciu ku komentáru"></textarea>
            </div>
            <input type="hidden" name="topic-id" value="<?= $_GET['id'] ?>" id="comment-topic-id">
            <input type="hidden" name="comment-id" value="<?= $comment['id'] ?>">
            <button onclick="Response.addResponse(event)" class="btn btn-sm btn-secondary" type="submit"
                    name="submit-comment-response">
                reagovať
            </button>
        </form>
    </div>
</div>



