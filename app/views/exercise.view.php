<?php require 'partials/header.php' ?>

<link rel="stylesheet" href="<?= ROOT ?>/assets/css/exercise.css">

<main>

    <div class="exercise-container">

        <h1 class="exercise-title"><?= $exercise->title ?></h1>

        <img src="<?= ROOT ?>/<?= $exercise->image ?>">

        <div class="exercise-content"><?= $exercise->content ?></div>

    </div>

</main>


<?php require 'partials/footer.php' ?>