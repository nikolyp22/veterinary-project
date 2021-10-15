<?php

session_start();

if (!empty($_SESSION['role']) && $_SESSION['role'] == 'moderador') {
    require_once '../../database.php';
    $conn = Connection::connect();
} else {
    header("Location: /veterinary-project/index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard </title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/styles.css">

</head>

<body>

    <?php include_once("../../partials/navbar.php"); ?>

    <div id="content">
        <main id="admin-content">
            <div class="container-sm">
                <div class="row g-0">
                    <div class="col-lg-4 d-flex align-items-center">
                        <div class="content-config mx-auto align-self-center justify-content-center p-5">
                            <div class="card testimonial-card text-center bg-dark z-depth-5">
                                <div class="card-body">
                                    <div class="card-title text-white pt-3 px-5">
                                        <p class="h3">
                                            <?= $_SESSION['username']; ?>
                                        </p>
                                        <p class="h5 text-muted" data-toggle="tooltip" title="Cargo">
                                            <?= $_SESSION['role']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="fas fa-eye"></i> Ver usuarios
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#createServiceModal">
                                        <i class="fas fa-comments-dollar"></i> Crear Servicios
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="fas fa-tags"></i> Agregar productos
                                    </a>
                                    <a href="javascript: history.go(-1)" class="list-group-item list-group-item-action">
                                        <i class="fas fa-undo"></i> Volver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 d-flex">
                        <div class="content-config align-self-center justify-content-center mx-auto my-5">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card text-center z-depth-5 w-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Categorias</h4>
                                            <p class="card-text">
                                                Asigna, crea y gestiona las categorias del sistema.
                                            </p>
                                            <a href="/categories" class="btn btn-dark btn-sm">
                                                Ver <i class="fas fa-arrow-alt-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card text-center z-depth-5 w-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Registradoras</h4>
                                            <p class="card-text">
                                                Asigna y gestiona las cajas registradoras del sistema.
                                            </p>
                                            <a href="/cash-registers" class="btn btn-dark btn-sm">
                                                Ver <i class="fas fa-arrow-alt-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card text-center z-depth-5 w-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Productos</h4>
                                            <p class="card-text">
                                                Visualiza, edita y elimina los productos del sistema.
                                            </p>
                                            <a href="/products" class="btn btn-dark btn-sm">
                                                Ver <i class="fas fa-arrow-alt-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="modal fade" id="createServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Crear servicio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form action="create_service.php" method="POST">
                        <div class="md-form mb-5">
                            <i class="fas fa-store-alt prefix text-white"></i>
                            <input type="text" name="name" id="orangeForm-name" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Nombre</label>
                        </div>
                        <div class="md-form mb-5">
                            <i class="fas fa-image prefix text-white"></i>
                            <input type="url" name="image" id="orangeForm-image" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Imagen</label>
                        </div>
                        <div class="md-form mb-5">
                            <i class="fas fa-align-left prefix text-white"></i>
                            <input type="text" name="description" id="orangeForm-email" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-email">Descripción</label>
                        </div>
                        <div class="md-form mb-4">
                            <i class="fas fa-dollar-sign prefix text-white"></i>
                            <input type="text" name="value" id="orangeForm-pass" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Valor</label>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("../../partials/footer.php"); ?>

</body>