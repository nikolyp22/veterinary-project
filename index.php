<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Veterinaria </title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>

    <?php include_once("./partials/navbar.php"); ?>

    <div id="content">
        <main id="main-content">
            <section class="home" id="home">
                <div class="container-fluid">
                    <div class="row g-0">
                        <div class="col-lg-6 d-flex">
                            <div class="justify-content-center align-items-center align-self-center mx-auto text-center">
                                <h1 class="h1-responsive">
                                    Nosotros los cuidamos
                                </h1>
                                <h2 class="text-muted">Ellos cuidan de ti</h2>
                                <!--<p>
                            ¿Necesitas ayuda para tú mascota? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Itaque unde vero sequi suscipit sunt aspernatur labore eius consequatur illo similique
                            tenetur, repudiandae voluptatem atque reprehenderit deleniti necessitatibus fugit
                            exercitationem ad?
                        </p>-->
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <div class="justify-content-center align-content-center align-self-center mx-auto">
                                <img src="./assets/images/veterinary.png" alt="Imagen representativa de una veterinaria" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php include_once("./partials/footer.php"); ?>

</body>

</html>
