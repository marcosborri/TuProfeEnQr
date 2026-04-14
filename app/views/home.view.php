<?php require 'partials/header.php'?>

<h1>Vista de Home</h1>


<?php foreach ($exercise as $item): ?>
    <h1><?= $exercise->title ?></h1>

    <div class="text"><?= $item->content ?></div>

    <img src="<?= ROOT ?><?= $item->image ?>">

    <?php if ($_SESSION['USER']): ?>
        <form method="POST" action="<?= ROOT ?>/home/delete">
            <input type="hidden" name="id" value="<?= $item->id ?>">

            <button type="submit" onclick="return confirm('¿Seguro que querés eliminar este ejercicio?')">
                Eliminar
            </button>
        </form>
    <?php endif?>

<?php endforeach ?>

<?php require 'partials/footer.php'?>