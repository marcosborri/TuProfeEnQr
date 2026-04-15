<?php require 'partials/header.php'?>
<main class = "main">
    <section class = "exercises-container">
        <?php foreach ($exercise as $item): ?>
            <div class="exercise-card">
                <h1><?= $item->title ?></h1>

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
            </div>

        <?php endforeach ?>
    </section>
</main>
<?php require 'partials/footer.php'?>