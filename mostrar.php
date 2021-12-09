<?php
include_once('conexion.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css"> 
    <?php
                include_once('consulta.php');
                
                $consulta = laconsulta();

            ?>
    <title>Document</title>
</head>
<body>
    <div id='mostrardatos'>
        <div id='tdatos'>
            <h2>Solicitudes de pacientes</h2>
            <table  border='1' >
            <tr>
                <td>Cedula</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>correo</td>
                <td>solicitud nº</td>
                <td>Motivo de la solicitud</td>
                <td>estado de la solicitud</td>
                <td>resultado</td>
            </tr>
            <?php
                while($persona = $consulta->fetch_assoc()){

            ?>

            
            <tr>

                <td><?php echo $persona['idpaciente'] ?></td>
                <td><?php echo $persona['nombre'] ?></td>
                <td><?php echo $persona['apellido'] ?></td>
                <td><?php echo $persona['correo'] ?></td>
                <td><?php echo $persona['idsolicitud'] ?></td>
                <td><?php echo $persona['motivo'] ?></td>
                <td><?php echo $persona['estado'] ?></td>
                <td><?php echo $persona['resultado'] ?></td>
            </tr>
            <?php
            }
            ?>
            
        </table>
        <a href="index.php">Volver al Inicio</a>
    </div>
    <div id='resultados'>
    <h2>Ingresar el resultado</h2>
        
        <form  method="POST">
        <table>
            <tr>
                <td>Cedula:</td>
                <td><input type="text" name="cedula"></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre"></td>
            </tr>
            <tr>
                <td>refencia de solicitud:</td>
                <td><input type="number" name="idsolicitud"></td>
            </tr>
            <tr>
                <td>estado del examen:</td>
                <td>
                    <select name="resultado">
                        <option value="positivo">Positivo</option>
                        <option value="negativo">Negativo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>direccion de correo:</td>
                <td><input type="text" name="correo"></td>
            </tr>
            <tr>
                <td>asunto:</td>
                <td><input type="text" name="asunto"></td>
            </tr>
            <tr>
                <td>contenido del correo:</td>
                <td>
                    <textarea name="contenido" id='contenido' cols="30" rows="10"></textarea>
                </td>
            </tr>
        </table> 
               
        <input type="submit" name="registrar" value="registrar resultado">
        </form>
    </div>
</div>
<?php include_once("resultado.php"); ?>
</body>
</html>