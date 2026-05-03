
<?php require 'partials/header.php'?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/login.css">

<div class="login-container">
    <form class="login-form" method="POST">

        <label class="form-username-label" for="username">Usuario:</label>
        <input class="form-username-input" type="text" name="username" placeholder="ingrese su usuario">

        <label class="form-password-label" for="password">Contraseña:</label>
        <input class="form-password-input" type="password" name="password" placeholder="ingrese su contraseña">
        <button class="form-submit-button" type="submit">Ingresar</button>

    </form>
</div>

<?php if (!empty($errors)): ?>
    <div class="error"><?= implode('<br>', $errors) ?></div>
<?php endif ?>



<?php require 'partials/footer.php' ?>