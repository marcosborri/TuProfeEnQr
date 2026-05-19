<link rel="stylesheet" href="<?= ROOT ?>/assets/css/home.css">
<?php require 'partials/header.php'?>

<main class="main">
    <section class="exercises-container">
        <?php foreach ($exercise as $item): ?>
            
            <div class="exercise-card">
                
                <div onclick="window.location='<?= ROOT ?>/home/exercise/<?= $item->id ?>';">
                    <h1><?= $item->title ?></h1>
                    <img src="<?= ROOT ?><?= $item->image ?>">
                </div>

                <?php if ($_SESSION['USER']): ?>
                    <div class="admin-buttons">
                        <button onclick="window.location='<?= ROOT ?>/editexercise/<?= $item->id ?>';">
                            Editar
                        </button>

                        <form method="POST" action="<?= ROOT ?>/home/delete">
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                            <button type="submit" onclick="return confirm('¿Seguro que querés eliminar este ejercicio?')">Eliminar</button>
                        </form>
                    </div>
                <?php endif?>
            </div>

        <?php endforeach ?>
    </section>
</main>
<?php require 'partials/footer.php'?>