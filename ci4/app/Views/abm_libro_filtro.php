
    <?php if (session()->get('nivel') > 2) 
        {
            header('Location: http://proyecto3.tk/');
        }?>
<body>
    <div class="container">
        <h1>ABM Libro</h1>
        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo base_url().'/crearLibroFiltro'?>" method="POST">
                    <label>Libro</label>
                    <input type="text" name="nombreLibro" id="nombreLibro" class="form-control" required pattern="([A-zÀ-ž\s]){2,}">
                    <label>Año</label>
                    <input type="text" name="year" id="year" class="form-control" required pattern="([0-9\s]){4,}">
                    <label>Edicion</label>
                    <input type="text" name="edicion" id="edicion" class="form-control" required pattern="([A-zÀ-ž\s]){2,}">
                    <label>Direccion</label>
                    <input type="url" name="dirDoc" id="dirDoc" class="form-control">
                    <label>Imagen</label> <br>
                    <select name="tblImagen_idtblImagen" id="tblImagen_idtblImagen" class="form-control" required>
                        <option selected>seleccione una imagen</option>
                        <?php foreach ($imagen as $imagenData): ?>
                        <option value="<?= $imagenData['IDimagen']?>"><?=$imagenData['nombreImagen'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Autores</label> <br>
                    <select name="IDAutor" id="IDAutor" class="form-control" required>
                        <option selected>Seleccione un Autor principal</option>
                        <?php foreach ($autor as $autorData): ?>
                        <option value="<?= $autorData['IDAutor']?>"><?=$autorData['nombreAutor'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Tags</label> <br>
                    <select name="IDTag" id="IDTag" class="form-control" required>
                        <option selected>Seleccione un Tag principal</option>
                        <?php foreach ($tag as $tagData): ?>
                        <option value="<?= $tagData['IDTag']?>"><?=$tagData['nombreTag'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Filtro</label> <br>
                    <input list="IDFiltro">
                    <datalist name="IDFiltro" id="IDFiltro" class="form-control" required>
                        <option selected>seleccione un Directorio</option>
                        <?php foreach ($filtro as $filtroData): ?>
                            <?php if(($filtroData['ESTADO'])==1): ?>
                        <option value="<?= $filtroData['ID']?>"><?=$filtroData['CIUDAD'].'/'.$filtroData['GESTION'].'/'.$filtroData['FACULTAD'].'/'.$filtroData['CARRERA'].'/'.$filtroData['SEMESTRE'].'/'.$filtroData['MATERIA'];?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </datalist>
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option selected>seleccione un estado</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                       
                </form>
            </div>
        </div>
        <br>
        <div>
        <a class="btn btn-primary btn-lg btn-block" href="/librorelacion" role="button">Añadir mas autores y tags a un libro</a>
        </div>
        <?php /*if (session()->get('exitoso')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('exitoso') 
        </div> */?>

        <?php //print_r($libro[0]['idtblAutor']);
           /*         
             $IDsAutores = $integerIDs = array_map('intval', explode(',', $libro[0]['idtblAutor']));       
                        ?>
                        <?php print_r($IDsAutores);
                        foreach ($libro as $ids) {
                            array_push($libro[$ids],$IDsAutores) ;
                        } */
                            ?>
        <br>
        <h2>Listado de Libros</h2>
        <?php //print_r($libro )?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Libro</th>
                            <th>Año</th>
                            <th>Edicion</th>
                            <th>Direccion</th>
                            <th>Imagen</th>
                            <th>Autor(es)</th>
                            <th>Tag(S)</th>
                            <th>Filtro(s)</th>
                            <th>Editar</th>
                           <!-- <th>Eliminar</th> -->
                        </tr>
                        
                        <tr>
                        <?php foreach ($libro as $key): ?>
                            <?php if(($key['estado'])==0): ?>
                            <td><?php echo $key['nombreLibro'] ?> </td>
                            <td><?php echo $key['year'] ?> </td>
                            <td><?php echo $key['edicion'] ?> </td>
                            <td><a href="<?php echo $key['dirDoc'] ?>">Enlace</a></td>
                            <td><a href="<?php echo $key['dirImagen']?>"><?php echo $key['nombreImagen'] ?></a></td>
                            <td><?php echo $key['autores'] ?></td>
                            <td><?php echo $key['tags'] ?></td>
                            <td><?php echo $key['filtros']?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreLibroFiltro/'.$key['idtblLibro'].'/'.$key['idtblImagen'].'/'.$key['idtblAutor'].'/'.$key['idtblTag'].'/'.$key['filtros']?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td> <!-- esto es lo que explicaba el sujeto, que los controladores reciben parametros -->
                           <!-- <td>
                                <a href="<?php //echo base_url().'/eliminarLibroLogic/'.$key->idtblLibro?>" class="btn btn-danger btn-small">Eliminar</a>
                            </td> -->
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <h2>Listado de Libros eliminados</h2>                        
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Libro</th>
                            <th>Año</th>
                            <th>Edicion</th>
                            <th>Direccion</th>
                            <th>Imagen</th>
                            <th>Autor(es)</th>
                            <th>Tag(S)</th>
                            <th>Filtro(s)</th>
                            <th>Editar</th>
                        </tr>
                        
                        <tr>
                        <?php foreach ($libro as $key): ?>
                            <?php if(($key['estado'])==1): ?>
                            <td><?php echo $key['nombreLibro'] ?> </td>
                            <td><?php echo $key['year'] ?> </td>
                            <td><?php echo $key['edicion'] ?> </td>
                            <td><a href="<?php echo $key['dirDoc'] ?>">Enlace</a></td>
                            <td><a href="<?php echo $key['dirImagen']?>"><?php echo $key['nombreImagen'] ?></a></td>
                            <td><?php echo $key['autores'] ?></td>
                            <td><?php echo $key['tags'] ?></td>
                            <td><?php echo $key['filtros']?></td>
                            <td>
                            <a href="<?php echo base_url().'/obtenerNombreLibroFiltro/'.$key['idtblLibro'].'/'.$key['idtblImagen'].'/'.$key['idtblAutor'].'/'.$key['idtblTag'].'/'.$key['filtros']?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                           <!-- <td>
                                <a href="<?php //echo base_url().'/eliminarLibroLogic/'.$key->idtblLibro?>" class="btn btn-success btn-small">Restaurar</a>
                            </td> -->
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>                        

    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">//sweet alert para que se vea mas bonito</script>
    
    <script type="text/javascript"> //muestra un alert si todo va bien
        let mensaje = "<?php echo $mensaje ?>";
        if(mensaje == '0' )
        {
            swal('😎','Agregado con exito','success');    //alert("Agregado con exito");
        }
        else if (mensaje == '1') 
        {
            swal('😑 ','Error en la insercion hay algo mal con la PK','error'); //alert("No se agrego, error en la insercion");    
        }
        else if (mensaje == '2') 
        {
            swal('😀','Actualizado con exito','success');    
        }
        else if (mensaje == '3') 
        {
            swal('😧 ','Error al actualizar','error');  
        }
        else if (mensaje == '4') 
        {
            swal('😈','Eliminado con exito','success');    
        }
        else if (mensaje == '5') 
        {
            swal('🤡','Error al eliminar','error');  
        }

    </script>
</body>