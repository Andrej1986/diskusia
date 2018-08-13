<h5>Pridať tému</h5>
<form action="helpers/topic_helper.php" method="post" class="comment-form">
    <div class="form-group">
        <label for="topic-name">Názov</label>
        <input class="form-control col-sm-6 col-md-6" type="text" name="topic-name" id="topic-name" required autofocus>
    </div>

    <button onclick="Topic.addTopic(event)" type="submit" name="submit-topic">Odošli</button>
</form>