    <?php if (session()->get('nivel') > 2) {
        header('Location: http://proyecto3.tk/');
    } ?>

    <body>
        <div class="container">
            <h1>ABM LibroRelacion</h1>
            <h3>Seleccione un autor y un libro para que sea asignado a dicho libro</h3>
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?php echo base_url() . '/crearLibroRelacion' ?>" method="POST">
                        <label>Libro</label>
                        <select name="idtblibro" id="idtblibro" class="form-control">
                            <option selected>Seleccione un Libro</option>
                            <?php foreach ($libro as $libroData) : ?>
                            <?php if(($libroData['estado'])==0): ?>
                                <option value="<?= $libroData['idtblLibro'] ?>"><?= $libroData['nombreLibro']; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <label>Autores</label> <br>
                        <select name="IDAutor" id="IDAutor" class="form-control">
                            <option selected>Seleccione un Autor</option>
                            <?php foreach ($autor as $autorData) : ?>
                                <option value="<?= $autorData['IDAutor'] ?>"><?= $autorData['nombreAutor']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
            //sweet alert para que se vea mas bonito
        </script>

        <script type="text/javascript">
            //muestra un alert si todo va bien
            let mensaje = "<?php echo $mensaje ?>";
            if (mensaje == '0') {
                swal('😎', 'Agregado con exito', 'success'); //alert("Agregado con exito");
            } else if (mensaje == '1') {
                swal('😑 ', 'Error en la insercion hay algo mal con la PK', 'error'); //alert("No se agrego, error en la insercion");    
            } else if (mensaje == '2') {
                swal('😀', 'Actualizado con exito', 'success');
            } else if (mensaje == '3') {
                swal('😧 ', 'Error al actualizar', 'error');
            } else if (mensaje == '4') {
                swal('😈', 'Eliminado con exito', 'success');
            } else if (mensaje == '5') {
                swal('🤡', 'Error al eliminar', 'error');
            }
        </script>
    </body>