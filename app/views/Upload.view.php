
<!--enctype es para que el archivo $_FILES no quede vacio al mandar la imagen -->
<form method="POST" enctype="multipart/form-data">


    <input type="text" name="title" placeholder="Nombre del ejercicio">

    <textarea name="content"></textarea>

    <input type="file" name="image">

    <button type="submit">Guardar</button>

    
</form>

