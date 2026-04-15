<?php require 'partials/header.php'?>

<form method="POST">

    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="ingrese su email">

    <label for="password">Contraseña:</label>
    <input type="password" name="password" placeholder="ingrese su contraseña">

    <button type="submit">Ingresar</button>

</form>

<?php if(!empty($errors)): ?>
    <div class="error"><?= implode('<br>', $errors) ?></div>
<?php endif ?>

<?php require 'partials/footer.php'?>
