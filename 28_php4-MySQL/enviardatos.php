<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = "UTN 2021" ?>
    
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>

    <?php
        include('header.php');
    ?>
    
    <div class="container">
        <h2>Datos recibidos</h2>
        <hr>
    <div class="form w-75">
        <?php
            // Cantidad de datos en POST
            //echo count($_POST);

            // echo "Datos recibidos";

            // Recorrer el array POST
            // foreach($_POST as $datos){
            //     echo $datos."<br>";
            // }

            // $_POST['nombre'] 
            // $_POST['email'] 
            // $_POST['mensaje'] 

    // Enviar la info por email

            //1) Definir los datos a enviar -> armar el array POST
            $nombre = $_POST['nombre'];
            $email =  $_POST['email'];
            $mensaje = $_POST['mensaje'];



            /*echo $nombre;
            echo $email;
            echo $mensaje;*/

            //2) Cargar los datos del envio -> destino, asunto, mensaje 
            $destinatario = "dev@mail.com;cliente@mail.com";
            $asunto = "Nuevo mensaje del sitio";
            $cuerpoMensaje = "Nombre: ".$nombre."<br> Email: ".$email."<br> Mensaje: ".$mensaje;

            //echo $cuerpoMensaje

            //Bonustrack: headers +  formato HTML
            // Para enviar un correo HTML, debe establecerse la cabecera Content-type
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // Cabeceras adicionales
            $cabeceras .= 'To:'.$destinatario;
            $cabeceras .= 'From: '. $nombre.'<'.$email.'>' . "\r\n";


            
            // 3) envio de datos
            @$envio1 = mail($destinatario,$asunto,$cuerpoMensaje, $cabeceras);

            // 4) Evaluacion del envio
             if($envio1 === false){
                 echo "<span class='alert alert-success'>Gracias ".$nombre." por escribirnos. Nos comunicaremos a la brevedad</span>";
             


             //Enviar todo esto a MySQL

             // Agregado fecha de envio -> DATE (0000-00-00)
             $fechaEnvio = date("Y-m-d");
             
             //1) Conexion -> mysqli_connect('servidorMySQL','UserMySQL','Password_User_MySQL','nombreBD')

             @$conexion = mysqli_connect('localhost','root','','webmaster2021') or exit("Error en la conexion."); //tambien podemos usar die()
             
             //2) mysqli_query(conexion, consultaMySQL)
             
             // Consulta 1 -> nuevo Contacto
             $consulta_alta = "INSERT INTO contactos VALUES(0,'$nombre','$email','$mensaje','$fechaEnvio')";
             $consulta = mysqli_query($conexion,$consulta_alta); 

             // Consulta 2 -> suscripcion
             if( isset($_POST['newsletter']) ){
                
                //$news = $_POST['newsletter'];
                $alta_suscripcion = mysqli_query($conexion,"INSERT INTO suscripcion VALUES(0, '$nombre','$email')");
            }
             
             //3) mysqli_close()
             $cerrarConexion = mysqli_close($conexion); 
            } else{
                echo "<span class='alert alert-danger'>Error en el envío.  Escribanos a ".$destinatario."</span>";
            }  

        ?>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>