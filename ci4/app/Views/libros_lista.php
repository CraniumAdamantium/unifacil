<body>
    <br><!-- Borré lo que copiaste con navbar y lo invoque en el controlador--------------------->
    <?php if (!empty($libros)) : ?>
        <!-- OK--------------------->
        <?php $id = session()->get('idtblUsuario');
        $fecha = date('y-m-d h:i:s');
        ?>
        <div class="jumbotron jumbotron-fluid">
            <h1 class="text-center display-5">LIBROS</h1>
        </div>
        <div class="col-sm-4">
      <input type="search" placeholder="Start typing.." name="search" class="form-control searchbox-input" required="">
    </div>
        <div class='container' style='margin-top:3em;'>
            <div class='card-columns custom-columns'>
                <?php foreach ($libros as $libro) : ?>
                    <form action="<?php echo base_url() . '/crearUsuarioLibro' ?>" method="POST">
                        <div class='card bg-dark' id="myItems"><!-- antes de esta linea para que se vea ordenado -->
                            <div class='card-body'>
                                <h5 class='card-title text-white' align='center'><?= $libro->nombreLibro; ?></h5>
                                <input type="text" hidden name="idtblLibro" id="idtblLibro" class="form-control" value="<?= $libro->idtblLibro; ?>">
                                <input type="text" hidden name="dirDoc" id="dirDoc" class="form-control" value="<?= $libro->dirDoc; ?>">
                                <input type="text" hidden name="idtblUsuario" id="idtblUsuario" class="form-control" value="<?php echo $id ?>">
                                <input type="text" hidden name="fecha" id="fecha" class="form-control" value="<?php echo $fecha ?>">
                                <img src="<?= $libro->dirImagen; ?>" class="card-img-top" alt="portada libro">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong class="text-dark">Autor(es):</strong><?= $libro->autores ?></li>
                                    <li class="list-group-item"><strong class="text-dark">Edición:</strong><?= $libro->edicion ?></li>
                                    <li class="list-group-item"><strong class="text-dark">AÑO:</strong><?= $libro->year ?></li>
                                    <a href="#" class="btn btn-accent-b btn-sm m-1 text-white">#<span itemprop="keywords"><?= $libro->tags ?></span></a>
                                    <button class='btn btn-light' type="submit">Leer</button>
                                </ul>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>

    <?php else : ?>
        <h1>No hay libros que mostrar, por favor contacte a soporte para informar el error</h1>
    <?php endif; ?>
    <!-- OK--------------------->

</body>
<script type="text/javascript">
$('.searchbox-input').on('keyup',function () {
  console.log(filter);
    //$('.card').show();
	var filter = $(this).val(); // get the value of the input, which we filter on
  console.log(filter);
    $('.container').find(".card-title:not(:contains(" + filter + "))").parent().css('display','none');
});
</script>
<footer>
    <hr>
    <a class="nav-link" href="/contacto">Contactanos si tienes alguna sugerencia o algun problema<span class="sr-only">(current)</span></a>
</footer>