<h1>Vista de Home</h1>


<form method="POST">
    <input type="text" name="titulo" placeholder="Nombre del ejercicio">

    <div id="editor" style="height: 300px;"></div>

    <input type="hidden" name="contenido" id="contenido">

    <button type="submit">Guardar</button>
</form>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="<?= ROOT ?>/assets/js/quill.js"></script>