<?php require 'partials/header.php' ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/login.css">



<form class="login-form" method="POST">

    <label class="form-email-label" for="email">Email:</label>
    <input class="form-email-input" type="email" name="email" placeholder="ingrese su email">

    <label class="form-password-label" for="password">Contraseña:</label>
    <input class="form-password-input" type="password" name="password" placeholder="ingrese su contraseña">
    <button class="form-submit-button" type="submit">Ingresar</button>

</form>

<?php if (!empty($errors)): ?>
    <div class="error"><?= implode('<br>', $errors) ?></div>
<?php endif ?>



<?php require 'partials/footer.php' ?>