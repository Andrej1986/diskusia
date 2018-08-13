<h5>Pridať komentár</h5>
<form action="helpers/index_helper.php" method="post" class="comment-form">
    <div class="form-group">
        <label for="comment-author">Autor</label>
        <input class="form-control col-sm-6 col-md-3" type="text" name="comment-author" id="comment-author" required>
    </div>

    <div class="form-group">
        <label for="comment-email">Email</label>
        <input class="form-control col-sm-6 col-md-3" type="email" name="comment-email" id="comment-email" required>
    </div>

        <input type="hidden" id="topic-id" name="topic-id" value="<?= $_GET['id'] ?>">

    <div class="form-group">
        <label for="comment">Tu napíšte svoj komentár</label>
        <textarea class="form-control col-md-6" type="text" name="comment" id="comment" rows="3" required></textarea>
    </div>

    <button onclick="Comment.addComment(event)" type="submit" name="submit-article-comment">Odošli</button>
</form>