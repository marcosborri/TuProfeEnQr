<?php require 'partials/header.php' ?>
<link rel='stylesheet' href='<?= ROOT ?>/assets/css/upload.css'>

<main>
    <div class="upload-container">

        <form method="POST" enctype="multipart/form-data" id="main-form">
            <input class="upload-title" type="text" name="title" placeholder="Nombre del ejercicio">

            <div class="toolbar">
                <button type="button" onclick="execCmd('bold', this)"><b>Negrita</b></button>

                <button type="button" onclick="execCmd('formatBlock', null, 'H2')">Título</button>
            </div>

            <div class="textarea" id="visual-editor" contenteditable="true"></div>

            <input type="hidden" name="content" id="hidden-content">

            <label class="file-label" id="file-upload">
                Seleccionar imagen
                <input type="file" name="image" hidden>
            </label>

            <button class="upload-submit" type="submit">Guardar</button>

            <div id="file-message"></div>
        </form>
        <?php if (!empty($errors)) : ?>
            <div class="errors">
                <?= implode("<br>", $errors) ?>
            </div>
        <?php endif; ?>

    </div>
</main>



<script src="<?= ROOT ?>/assets/js/form.js"></script>

<?php require 'partials/footer.php' ?>