<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /veterinary-project/index.php");
}

require_once '../../database.php';
$conn = Connection::connect();

# Services data.
$name = $_POST['name'];
$image = $_POST['image'];
$description = $_POST['description'];
$value = $_POST['value'];

if (!empty($name || $description || $value)) {
    $save_service = $conn->prepare("INSERT INTO services (name, image, description, value) VALUES (:name, :image, :description, :value)");
    $save_service->bindParam(':name', $name);
    $save_service->bindParam(':image', $image);
    $save_service->bindParam(':description', $description);
    $save_service->bindParam(':value', $value);
    if ($save_service->execute()) {
        $_SESSION['message'] = 'el servicio ha sido creado';
        $_SESSION['message_category'] = 'Correcto';
        $_SESSION['message_type'] = 'success';
        header("Location: /veterinary-project/src/admin/dashboard.php");
    } else {
        $_SESSION['message'] = 'Hubo un error creando el servicio';
        $_SESSION['message_category'] = 'Error';
        $_SESSION['message_type'] = 'warning';
        header("Location: /veterinary-project/index.php");
    }
} else {
    $_SESSION['message'] = 'Los campos no pueden estar vacíos';
    $_SESSION['message_category'] = 'Error';
    $_SESSION['message_type'] = 'warning';
    header("Location: /veterinary-project/index.php");
}
