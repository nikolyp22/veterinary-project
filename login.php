<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /');
}
require 'database.php';
$conn = Connection::connect();

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, name, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        $_SESSION['username'] = $results['name'];
        header("Location: /veterinary-project/index.php");
    } else {
        $message = 'Las credenciales de acceso son incorrectas';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php require './partials/navbar.php' ?>

    <?php if (!empty($message)) : ?>
        <p> <?= $message ?></p>
    <?php endif; ?>

    <section class="signin-content">
        <div class="container-sm mt-5">
            <div class="row g-0">
                <div class="col-lg-12 d-flex">
                    <div class="justify-content-center align-self-center mx-auto">
                        <form class="text-center border border-light p-5 bg-dark" action="login.php" method="POST">
                            <p class="h4 mb-4">Iniciar sesión</p>
                            <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
                            <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
                            <div class="d-flex justify-content-around">
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                        <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                                    </div>
                                </div>
                                <div>
                                    <a href="">Forgot password?</a>
                                </div>
                            </div>
                            <button class="btn btn-info btn-block my-4" type="submit">Entrar</button>
                            <p> No tiene una cuenta? 
                                <a href="" data-toggle="modal" data-target="#modalRegisterForm">Registrarse</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once('./partials/footer.php') ?>
</body>

</html>
