<?php 

session_start();

require_once '../../database.php';
$conn = Connection::connect();

if(!empty($_SESSION['role']) && $_SESSION['role'] == 'moderador') {
    
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
        <h1>Dashboard</h1>
    </div>

    <?php include_once("../../partials/footer.php"); ?>

</body>

