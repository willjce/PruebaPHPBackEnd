<? require '_header.php' ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">PARTE 02 : Aplicaci&oacute;n WEB usando Framework Slim</a>
        </div>
    </div>
</nav>

<div class="container">

    <form class="form-inline" method="post" action="">
        <!-- <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="" placeholder="Nombre">
        </div>-->
        <div class="form-group">
            <label for="txt_email">Email</label>
            <input class="form-control" id="txt_email" name="txt_email" placeholder="Email"> <!-- type="email" -->
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
    </form>
  
    <table class="table table-bordered table-hover ">
        <thead>
            <tr>
                <th style="width: 2%;">#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Posici&oacute;n</th>
                <th>Salario</th>
                <th style="width: 3%;"> &nbsp; </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $a_JsonData as $i_Key => $a_Data ){ ?>
            <tr>
                <td><?=$i_Key+1?></td>
                <td><?=$a_Data['name']?></td>
                <td><?=$a_Data['email']?></td>
                <td><?=$a_Data['position']?></td>
                <td><?=$a_Data['salary']?></td>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="abrirDetalle('<?=$a_Data['id']?>');">
                        Detalle
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
<script type="text/javascript">
abrirDetalle = function( id_det )
{
	$( "#content_modal" ).load( 'index.php/info_det', {'id_det':id_det } );
}
</script>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" onclick="abrirDetalle('574daa379545e9af101c2731');">
  Launch demo modal
</button> -->

<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Detalle de Empleado</h4>
                </div>
                <div class="modal-body" id="content_modal">
                ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

</div><!-- /.container -->




<? require '_footer.php' ?>