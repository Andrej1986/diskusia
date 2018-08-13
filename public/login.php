<?php require 'partials/header.php' ?>

<div class="container">
    <h2>Login</h2>

<?php require 'partials/login/login_errors_info.php'?>

    <form method="post" action="helpers/login_helper.php">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Heslo</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>

        <button class="btn btn-primary" type="submit" name="submit-login-data">Potvrdiť</button>
    </form>
</div>


<? require 'partials/footer.php';