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
        // require 'header.php';

        /* include / require / include_once  / require_once*/
    ?>
    
    <div class="container">
        <h2>Envios por POST</h2>
        <hr>
    <div class="form w-75">
        <form action="enviardatos.php" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mensaje" required></textarea>
            </div>

            <div class="mb-3">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="invalidCheck" name="newsletter" value="true" checked>
                <label class="form-check-label" for="invalidCheck">
                   Deseo suscribirme al newsletter del sitio.
                </label>
                </div>
            </div>


            <input class="btn btn-outline-primary" type="submit" value="Enviar">
        </form>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>