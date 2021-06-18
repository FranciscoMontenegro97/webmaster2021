<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = "UTN 2021" ?>
    
    <title><?php echo $title ?> / Mostrar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>

    <?php
        include('header.php');
    ?>  
    
    <div class="container">

        <?php

            /* Recuperar los datos de la tabla usuarios */

            /* Buscador */

            if(isset($_POST['busqueda'])){
                $search = $_POST['busqueda'];

                //realizar la busqueda, segun el dato enviado por search
            include "conexion.php";

            $query2 = "SELECT * FROM usuarios where nombre like '%$search%' or apellido LIKE '%$search%'";

            $consulta2 = mysqli_query($conexion, $query2); 

            $cantidadResultados = mysqli_num_rows($consulta2);
            if($cantidadResultados > 0 ){
                echo "<p class='alert alert-success'>Cantidad de resultados: ".$cantidadResultados."</p>";
            }
            else{
                echo "<p class='alert alert-danger'>No hay resultados.</p>";
            }            
            echo '<table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>';
            for ($i=0; $i < $cantidadResultados ; $i++) { 

                $datos = mysqli_fetch_array($consulta2);

                echo "<tr><td>".$datos['nombre']." ".$datos['apellido']."</td>";
                echo "<td>".$datos['edad']."</td>";
                echo "<td> <a href='mailto:".$datos['email']."'> ".$datos['email']."</a></td></tr>";
            }
            echo '</tbody></table>';
            
            mysqli_free_result($consulta2);
            mysqli_close($conexion);

            } else{

                
                //  Conexion mySQL
                include "conexion.php";
                
                // consulta SELECT
                $query1 = "SELECT * FROM usuarios";
                $consulta1 = mysqli_query($conexion, $query1); 
                
                // ver resultados / nro que va a fonzar la condicion del for
                $cantidadResultados = mysqli_num_rows($consulta1);
                if($cantidadResultados > 0 ){
                    echo "<p class='alert alert-success'>Cantidad de resultados: ".$cantidadResultados."</p>";
                }
                else{
                    echo "<p class='alert alert-danger'>No hay resultados.</p>";
                }            
                
                //procesar los datos de la respuesta de la bbdd, y mostrar en pantalla
                
                
                // Tablas de Bootstrap
                echo '<table class="table table-striped">
                <thead>
                <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Email</th>
                </tr>
                </thead>
                <tbody>';
                for ($i=0; $i < $cantidadResultados ; $i++) { 
                    
                    $datos = mysqli_fetch_array($consulta1);
                    
                    echo "<tr><td>".$datos['nombre']." ".$datos['apellido']."</td>";
                    echo "<td>".$datos['edad']."</td>";
                    echo "<td> <a href='mailto:".$datos['email']."'> ".$datos['email']."</a></td></tr>";
                }
                echo '</tbody></table>';
                
                /* Version While
                while($datos = mysqli_fetch_array($consulta1)){
                    echo $datos['nombre']." ".$datos['apellido']."<br>";
                    echo "edad: ".$datos['edad']."<br>";
                    echo "email: ".$datos[5]."<br>";
                    echo "<hr>";
                }*/
                
                //liberamos la memoria de la consulta
                mysqli_free_result($consulta1);
                // cerrar la conexion
                mysqli_close($conexion);
                
            }
                
        ?>
    </div>
</div>


<div>

</div>

<?php include "footer.php"; ?>

</body>
</html>