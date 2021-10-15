<?php
session_start();

require 'database.php';
$conn = Connection::connect();

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
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
        <section id="services-content">
            <div class="container">
                <div class="row g-0">
                    <?php
                    $get_services = $conn->prepare("SELECT name, image, description, value FROM services");
                    $get_services->execute();
                    $results = $get_services->fetchAll(PDO::FETCH_OBJ);
                    foreach ($results as $service) {
                    ?>
                        <div class="col-lg-4 d-flex">
                            <div class="justify-content-center align-self-center mx-auto mt-5">
                                <div class="card bg-dark text-center">
                                    <div class="view overlay">
                                        <img class="card-img-top img-fluid" src="<?php echo $service->image ? $service->image : 'https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg' ?>" alt="Card image cap">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $service->name; ?></h4>
                                        <p class="card-text">
                                            <?php echo $service->description; ?>
                                            <p> Costo: <?php echo $service->value; ?> </p>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } if(empty($results)) { ?>
                        <div class="col-lg-12 d-flex">
                            <div class="justify-content-center align-self-center mx-auto mt-5 text-center">
                                <h2>No hay servicios para mostrar</h2>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>

    <?php include_once("./partials/footer.php"); ?>

</body>

</html>