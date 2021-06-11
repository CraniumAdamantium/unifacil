<?php if (session()->get('nivel') > 2)
        {
            header('Location: http://proyecto3.tk/');
        }?>
<head>
<meta charset="utf-8"/> 
</head>
<div class="container">
<h3>Ahora debes agregar un autor o si ya esta en la lista, puedes continuar o poner desconocido</h3>
    <h1>ABM Autor</h1>
    <div class="row">
        <div class="col-sm-12">
            <form action="<?php echo base_url().'/crearAutor'?>" method="POST">
                <label>Autor</label>
                <input type="text" name="nombreAutor" id="nombreAutor" class="form-control">
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
    <?php /*if (session()->get('exitoso')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('exitoso') 
        </div> */?>

        <?php // endif; ?>
        <br>
        <h2>Listado de Autores</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark" id="styledTable">
                        <tr>
                            <th>Autor</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                        <?php if(($key->estado)==0): ?>
                        <tr>
                            <td><?php echo $key->nombreAutor ?>
                            </td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreAutor/'.$key->idtblAutor //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <h2>Listado de Autores Eliminados</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Autor</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                            <?php if(($key->estado)==1): ?>
                        <tr>
                            <td><?php echo $key->nombreAutor ?>
                            </td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreAutor/'.$key->idtblAutor //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                        </tr>
                        <?php endif;?> 
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
    <a class="btn btn-primary btn-lg btn-block" href="/tag" role="button">Continuar a Tags</a>

    <div class="buttonContainer">
        <button class="btn" id="jsPDF" >Export PDF with jsPDF</button>
        <button class="btn" id="browserPrint" >Export PDF with browser print</button>
        <p id="styledHeaderLink">See a similar page but with a <a href="styled-header.html">fancy styled header</a>.</p>
      </div>
      <iframe id="txtArea1" style="display:none"></iframe>
      <button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
    //sweet alert para que se vea mas bonito
    </script>

  <script type="text/javascript">
    function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('styledTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
  
  </script>

<!-- For jsPDF -->
<script src="/assets/js/html2canvas.1.0.0-rc.7.js"></script>
<script src="/assets/js/dompurify.2.2.0.min.js"></script>
<script src="/assets/js/jspdf.2.1.1.umd.min.js"></script>

<!-- PDF export methods I wrote using the libraries above -->
<script src="/assets/js/pdfExportMethods.js"></script>

    <script type="text/javascript">
    //muestra un alert si todo va bien
    let mensaje = "<?php echo $mensaje ?>";
    if (mensaje == '1') {
        swal('😎', 'Agregado con exito', 'success'); //alert("Agregado con exito");
    } else if (mensaje == '0') {
        swal('😑 ', 'Error en la insercion', 'error'); //alert("No se agrego, error en la insercion");    
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