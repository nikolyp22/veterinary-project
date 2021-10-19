<nav class="navbar navbar-expand-lg navbar-dark bg-dark scrolling-navbar sticky-top" style="z-index: 250;">
    <div class="container-xl">
        <div class="navbar-brand">
            <a data-activates="slide-out" class="mr-4" data-toggle="tooltip" title="Menú lateral">
                <i class="fas fa-bars fa-lg"></i>
            </a>
            <a href="/veterinary-project/index.php">
                <strong class="text-white">
                    <span class="h2 font-weight-bold">Numedas</span>
                </strong>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <div class="navbar-nav ml-auto">
                <div class="nav-item">
                    <a href="/veterinary-project/index.php" class="nav-link">
                        <i class="fas fa-home"></i>
                        Inicio
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-phone"></i>
                        Contacto
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-lock"></i>
                        Privacidad
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/veterinary-project/services.php" class="nav-link">
                        <i class="fas fa-comment-dollar"></i>
                        Servicios
                    </a>
                </div>
            </div>
            <div class="navbar-nav ml-auto">
                <?php if (!empty($_SESSION['username'])) : ?>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user">
                                <span class="font-weight-bold"><?= $_SESSION['username']; ?></span>
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalRegisterPet">Registrar Mascota</a>
                            <?php if ($_SESSION['role'] == 'moderador') { ?>
                                <a class="dropdown-item" href="/veterinary-project/src/admin/dashboard.php">Admin</a>
                            <?php } ?>
                            <a class="dropdown-item" href="/veterinary-project/logout.php">Logout</a>
                        </div>
                    </div>
                    <a href="/appointments/" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#takeAppointment">
                        <i class="fas fa-book-medical"></i> Citas
                    </a>
                <?php else : ?>
                    <a href="login.php" class="btn btn-primary btn-sm">
                        <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<?php include_once('message.php'); ?>

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Registrarse</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form action="signup.php" method="POST">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="name" id="orangeForm-name" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Nombre</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="email" name="email" id="orangeForm-email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="password" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Contraseña</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="confirm_password" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Confirmar contraseña</label>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-deep-orange">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalRegisterPet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Registrar Mascota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form action="/veterinary-project/register_pet.php" method="POST">
                    <div class="md-form mb-5">
                        <i class="fas fa-paw prefix text-white"></i>
                        <input type="text" name="name" id="orangeForm-name" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Nombre</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-palette prefix text-white"></i>
                        <input type="text" name="breed" id="orangeForm-email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-email">Raza</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-spider prefix text-white"></i>
                        <input type="text" name="specie" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Especie</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-sort-numeric-up-alt prefix text-white"></i>
                        <input type="number" name="age" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Edad</label>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="takeAppointment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Agendar Cita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form action="/veterinary-project/take_appointment.php" method="POST">
                    <div class="md-form mb-4">
                        <select name="service" class="browser-default custom-select">
                            <option default> Selecciona un servicio</option>
                            <?php
                            $get_services = $conn->prepare("SELECT id, name, value FROM services");
                            $get_services->execute();
                            $services = $get_services->fetchAll(PDO::FETCH_OBJ);
                            foreach ($services as $service) {
                            ?>
                                <option value="<?php echo $service->id; ?>"><?php echo $service->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="md-form mb-4">
                        <select name="pet" class="browser-default custom-select">
                            <option default> Selecciona tu mascota</option>
                            <?php
                            $get_pet = $conn->prepare("SELECT id, name FROM pets WHERE owner = :owner");
                            $get_pet->bindParam(':owner', $_SESSION['user_id']);
                            $get_pet->execute();
                            $pets = $get_pet->fetchAll(PDO::FETCH_OBJ);
                            foreach ($pets as $pet) {
                            ?>
                                <option value="<?php echo $pet->id; ?>"><?php echo $pet->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--<div class="md-form mb-4">
                        <i class="fas fa-dollar-sign prefix text-white"></i>
                        <input type="number" name="total_value" id="orangeForm-pass" value="<?php echo $services; ?>" class="form-control validate disabled" disabled>
                        <label data-error="wrong" data-success="right" for="orangeForm-pass"><?php echo $services->value; ?></label>
                    </div>-->
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary">Guardar Cita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>