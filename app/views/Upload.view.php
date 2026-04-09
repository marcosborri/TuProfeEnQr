

<form method="POST">
    <input type="text" name="title" placeholder="Nombre del ejercicio">

    <div id="editor" style="height: 300px;"></div>

    <input type="hidden" name="content" id="content">

    <button type="submit">Guardar</button>

    <input type="file" name="image">
</form>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="<?= ROOT ?>/assets/js/quill.js"></script>