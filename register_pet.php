<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /veterinary-project/index.php");
}

require_once 'database.php';
$conn = Connection::connect();

# Pet data.
$name = $_POST['name'];
$breed = $_POST['breed'];
$specie = $_POST['specie'];
$age = $_POST['age'];

if (!empty($name || $breed || $specie || $age)) {
    $save_pet = $conn->prepare("INSERT INTO pets (name, breed, specie, age, owner) VALUES (:name, :breed, :specie, :age, :owner)");
    $save_pet->bindParam(':name', $name);
    $save_pet->bindParam(':breed', $breed);
    $save_pet->bindParam(':specie', $specie);
    $save_pet->bindParam(':age', $age);
    $save_pet->bindParam(':owner', $_SESSION['user_id']);
    if ($save_pet->execute()) {
        $_SESSION['message'] = 'Hemos registrado su mascota';
        $_SESSION['message_category'] = 'Correcto';
        $_SESSION['message_type'] = 'success';
        header("Location: /veterinary-project/index.php");
    } else {
        $_SESSION['message'] = 'Hubo un error registrando su mascota';
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
