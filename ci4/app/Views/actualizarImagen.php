<?php if (session()->get('nivel') != 1) {
    header('Location: http://proyecto3.tk/');
}?>
<?php

    $idtblImagen = $datos[0]['idtblImagen'];
    $nombreImagen = $datos[0]['nombreImagen'];
    $dirImagen = $datos[0]['dirImagen'];
    $estado = $datos[0]['estado'];

?>

<body>
    <div class="container">
        <h1>Actualizar Imagen</h1>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST"
                    action="<?php echo base_url() . '/actualizarImagen'?>">
                    <input type="text" id="idtblImagen" name="idtblImagen" hidden=""
                        value="<?php echo $idtblImagen ?>">
                    <!--poner los mismos nombres de las tablas para evitar confusion-->
                    <label for="nombreImagen">Nombre de la Imagen</label>
                    <input type="text" name="nombreImagen" id="nombreImagen" class="form-control"
                        value="<?php echo $nombreImagen ?>" required pattern="([A-zÀ-ž0-9\s]){2,}">
                    <label for="dirImagen">URL de la Imagen</label>
                    <input type="url" name="dirImagen" id="dirImagen" class="form-control"
                        value="<?php echo $dirImagen ?>">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option selected>seleccione un estado</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>
                    <br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
</body>