<?php if ($_SESSION['empty-fields']??''): ?>
	<?php foreach ($_SESSION['empty-fields'] as $empty_field): ?>
        <p class="bg-warning"><?= $empty_field ?></p>
		<?php unset($_SESSION['empty-fields']); ?>
	<?php endforeach; ?>
<?php endif; ?>

<?php if ($_SESSION['login-errors']??''): ?>
	<?php foreach ($_SESSION['login-errors'] as $empty_field): ?>
        <p class="bg-warning"><?= $empty_field ?></p>
		<?php unset($_SESSION['login-errors']); ?>
	<?php endforeach; ?>
<?php endif; ?>