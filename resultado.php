<?php

if(isset($_POST['registrar'])){
    if(!empty($_POST['nombre']) && !empty($_POST['cedula']) && !empty($_POST['correo'])
     && !empty($_POST['contenido'])){
        $nombre = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $asunto = $_POST['asunto'];
        $correo = $_POST['correo'];
        $idsolicitud = $_POST['idsolicitud'];
        $resultado = $_POST['resultado'];
        $contenido = $_POST['contenido'];

        $U = "update solicitud set estado = 'procesado' where idpaciente = '$cedula'";
        $rsU = mysqli_query($conexion, $U) or die(mysqli_error($conexion));

        $T = "  UPDATE resultados set resultados.resultado = '$resultado' 
        where resultados.idsolicitud = '$idsolicitud'";
        $rsT = mysqli_query($conexion, $T) or die(mysqli_error($conexion));



        $header = "From: noreply@example.com" . "\r\n";
        $header.= "Reply-To = noreply@example.com" . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion();
        $mail= @mail($correo, $asunto, $contenido, $header);

        if($mail){
            echo "<h3>enviado exitosamente</h3>";
        }
     }
}

?>