<?php
require_once "conexion.php";

$con = $conexion;
$consulta = '';

function laconsulta(){
    global $con, $consulta;
    
    $sql = "SELECT pacientes.idpaciente, pacientes.nombre, pacientes.apellido, 
                pacientes.correo, solicitud.idsolicitud, solicitud.motivo, solicitud.estado, resultados.resultado 
                from pacientes, solicitud, resultados
                where pacientes.idpaciente = solicitud.idpaciente and 
                solicitud.idsolicitud = resultados.idsolicitud";

    return $con -> query($sql);
}

?>