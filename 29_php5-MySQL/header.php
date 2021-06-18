    <header class="container-fluid bg-danger text-white p-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="logo">
                        <h1>
                            <?php echo $title; ?>
                        </h1>
                    </div>
                </div>
                <div class="col-5">
                    <span>
                        <a href="">Nosotros</a>
                        <a href="">Servicios</a>
                        <a href="">Contacto</a>
                    </span>
                </div>

                <div class="col-3">
                    <form action="mostrarusuarios.php" method='post'>
                        <input type="search" class="form-control" name="busqueda" placeholder="buscar usuarios...">
                    </form>
                </div>
            </div>
        </div>
    </header>