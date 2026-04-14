<h1>Vista de Home</h1>


<?php foreach ($exercise as $exercise): ?>
    <h1><?= $exercise->title ?></h1>

    <div class="text"><?= $exercise->content ?></div>

    <img src="<?= ROOT ?><?= $exercise->image ?>">

    <?php if ($_SESSION['USER']): ?>
        <button onclick="<?php $ex = new Exercise; 
        $ex->delete($exercise->id) ?>" 
        
        name="delete" type="button">Eliminar</button>
    <?php endif?>

<?php endforeach ?>