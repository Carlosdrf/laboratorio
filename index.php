<?php
include_once('conexion.php');


if(isset($_POST["escribir"])){ 
    if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['idpaciente']) 
    && !empty($_POST['correo']) && !empty($_POST['motivo'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['idpaciente'];
        $correo = $_POST['correo'];
        $motivo = $_POST['motivo'];


        $Q="Insert Into pacientes(idpaciente, nombre, apellido, correo) values ('$cedula', '$nombre', '$apellido'
        , '$correo')";
        $S = "Insert Into solicitud(idpaciente, motivo, estado) values ('$cedula', '$motivo', 'en proceso')";
        

        $rsQ = mysqli_query($conexion, $Q) or die(mysqli_error($conexion));
        $rsS = mysqli_query($conexion, $S) or die(mysqli_error($conexion));
        
        if($rsQ == true){
        echo '<script>
        location.href="index.php";
        </script>';
        }
    }else{
        echo '<script language="javascript">window.alert("Parece que has dejado vacio algun campo");</script>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>laboratorio</title>
</head>
<body>
    <div id='inicio'>
        <h1>Informacion del paciente</h1>
        <h3>Ingresar los siguientes datos:</h3>
        <form action="index.php" method="POST">
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre"></td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td><input type="text" name="apellido"></td>
            </tr>
            <tr>
                <td>Numero de cedula:</td>
                <td><input type="text" name="idpaciente"></td>
            </tr>
            <tr>
                <td>Correo:</td>
                <td><input type="email" name="correo"></td>
            </tr>
            <tr>
                <td>Motivo de la solicitud:</td>
                <td><input type="text" name="motivo"></td>
            </tr>
        </table> 
               
        <input type="submit" name="escribir" value="Registrar">
        </form>
        <br><br>
        <a href="mostrar.php">Click aqui mostrar los pacientes en sistema</a>
    </div>
</body>
</html>