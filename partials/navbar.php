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
                    <a href="#" class="nav-link">
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
                    <a href="#" class="nav-link">
                        <i class="fas fa-comment-dollar"></i>
                        Servicios
                    </a>
                </div>
            </div>
            <div class="navbar-nav ml-auto">
                <?php if (!empty($_SESSION['username'])) : ?>
                    <div class="navbar-text align-self-center">
                        <span class="user mr-2" data-toggle="tooltip" title="Usuario">
                            <i class="fas fa-user"></i>
                            <span class="font-weight-bold"><?= $_SESSION['username']; ?></span>
                            <a href="logout.php"></a>
                        </span>
                    </div>
                    <a href="/appointments/" class="btn btn-primary btn-sm">
                        <i class="fas fa-book-medical"></i> Citas
                    </a>
                <?php else : ?>
                    <a href="login.php" class="btn btn-primary btn-sm" >
                        <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form action="signup.php" method="POST">
                    <?php if (!empty($message)) : ?>
                        <p> <?= $message ?></p>
                    <?php endif; ?>
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
