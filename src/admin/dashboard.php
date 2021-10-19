<?php

session_start();

require_once '../../database.php';
$conn = Connection::connect();

if (!empty($_SESSION['role']) && $_SESSION['role'] == 'moderador') {
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
                                    <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#exampleModalCenter">
                                        <i class="fas fa-eye"></i> Ver usuarios
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#createServiceModal">
                                        <i class="fas fa-comments-dollar"></i> Crear Servicios
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
                            <table class="table table-striped table-responsive-md">
                                <thead class="black white-text">
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Mascota</th>
                                        <th>Servicio</th>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                    <?php
                                    $get_appointments = $conn->prepare("SELECT a.id, a.datetime, p.name AS pet, s.name AS service, u.name AS user FROM appointments AS a INNER JOIN pets AS p ON p.id = a.pet
                                    INNER JOIN services AS s ON s.id = a.service
                                    INNER JOIN users AS u ON u.id = p.owner");
                                    $get_appointments->execute();
                                    $appointments = $get_appointments->fetchAll(PDO::FETCH_OBJ);
                                    ?>
                                    <?php foreach ($appointments as $appointment) { ?>
                                        <tr>
                                            <td><?php echo $appointment->id; ?></td>
                                            <td><?php echo $appointment->datetime; ?></td>
                                            <td><?php echo $appointment->pet; ?></td>
                                            <td><?php echo $appointment->service; ?></td>
                                            <td><?php echo $appointment->user; ?></td>
                                            <td>
                                                <a href="/veterinary-project/src/appointments/delete.php?id=<?php echo $appointment->id; ?>" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    if (empty($appointments)) { ?>
                                        <tr>
                                            <td>No hay citas agendadas</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Usuarios del sistema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/veterinary-project/src/admin/edit_user.php" method="POST">
                        <table class="table table-striped table-responsive-md bg-light">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $get_users = $conn->prepare("SELECT id, name, email, role FROM users");
                                $get_users->execute();
                                $users = $get_users->fetchAll(PDO::FETCH_OBJ);
                                ?>
                                <?php foreach ($users as $user) { ?>
                                    <form action="/veterinary-project/src/admin/edit_user.php?id=<?php echo $user->id; ?>" method="POST">
                                        <tr>
                                            <td>
                                                <input type="number" name="id" class="disabled" value="<?php echo $user->id; ?>" disabled>
                                            </td>
                                            <td>
                                                <input type="text" name="name" value="<?php echo $user->name; ?>">
                                            </td>
                                            <td>
                                                <input type="email" name="email" value="<?php echo $user->email; ?>">
                                            </td>
                                            <td>
                                                <select name="role">
                                                    <option default><?php echo $user->role; ?></option>
                                                    <option value="usuario">Usuario</option>
                                                    <option value="moderador">Moderador</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="d-inline-flex">
                                                    <button class="btn btn-primary btn-sm" type="submit" name="update">
                                                        <i class="fas fa-save"></i>
                                                    </button>
                                                    <!--<a href="/veterinary-project/src/admin/delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>-->
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("../../partials/footer.php"); ?>

</body>