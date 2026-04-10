<form method="POST" enctype="multipart/form-data" id="main-form">
    <input type="text" name="title" placeholder="Nombre del ejercicio">

    <div class="toolbar">
        <button type="button" onclick="execCmd('bold')"><b>B</b></button>
        <button type="button" onclick="execCmd('italic')"><i>I</i></button>
        <button type="button" onclick="execCmd('formatBlock', 'h2')">H2</button>
        <button type="button" onclick="execCmd('insertUnorderedList')">Lista</button>
    </div>

    <div id="visual-editor" contenteditable="true" style="border: 1px solid #ccc; min-height: 200px; padding: 10px;"></div>

    <input type="hidden" name="content" id="hidden-content">

    <input type="file" name="image">
    <button type="submit">Guardar</button>
</form>

<script src="<?= ROOT ?>/assets/js/form.js"></script>
