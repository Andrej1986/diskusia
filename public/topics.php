<div id="all">
	<?php require 'partials/header.php';

	use App\Authenticated;

	$authenticated = new Authenticated();
	?>

    <div class="container" id="home">
        <h2 id="topics">Témy</h2>

        <hr>
        <div class="all-topics col-sm-12">
            <div id="all-topics">
				<?php foreach ($topics->selectAllTopics() as $topic): ?>
                    <div id="the-topic-<?= $topic['id']; ?>">
                        <div class="row">
                            <div class="comment col-sm-8">
                                <div class="the-comment"><a
                                            href="<?= 'comments.php?id=' . $topic['id'] ?>"><?= htmlspecialchars($topic['name']) ?></a>
                                </div>

                                <div class="author-and-date">
                                    <span>Počet kometárov: <?= $topic['comments'] ?></span>
                                </div>
                            </div>

							<?php if ($authendicated->admin()): ?>
                                <div class="delete-topic">
                                    <input type="hidden" value=<?= $topic['id'] ?>>
                                    <a onclick="Topic.deleteTopic(event)"
                                       href="helpers/topic_helper.php?topic-id=<?= $topic['id'] ?>">Vymazať</a>
                                </div>
							<?php endif; ?>
                        </div>
                        <hr>
                    </div>
				<?php endforeach; ?>
            </div>

        </div>

		<?php if ($authendicated->admin()): ?>
			<?php require 'partials/index/add_topic.php' ?>
		<?php endif; ?>

    </div>

	<?php require 'partials/footer.php'; ?>
</div>
