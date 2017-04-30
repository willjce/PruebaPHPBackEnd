<?php if( $a_JsonDataSel ){ ?>
    <div class="bs-callout">
        <h4>Nombre:</h2>
        <p><?=$a_JsonDataSel['name']?></p>
        
        <h4>Email:</h2>
        <p><?=$a_JsonDataSel['email']?></p>
        
        <h4>Telefono:</h2>
        <p><?=$a_JsonDataSel['phone']?></p>
        
        <h4>Direcci&oacute;n:</h2>
        <p><?=$a_JsonDataSel['address']?></p>
        
        <h4>Posici&oacute;n:</h2>
        <p><?=$a_JsonDataSel['position']?></p>
        
        <h4>Salario:</h2>
        <p><?=$a_JsonDataSel['salary']?></p>
        
        <h4>Experiencia en:</h2>
        <?php foreach ( $a_JsonDataSel['skills'] as $i_Key => $a_Data ){ ?>
            <p><?=$a_Data['skill']?></p>
        <?php } ?>
    </div>
<?php }else{ ?>
    <div class="span4"><h2>No existe el empleado.</h2></div>
<?php } ?>