<?php

require 'database.php';
$conn = Connection::connect();

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Hemos creado su usuario, ahora debe iniciar sesión';
        $_SESSION['message_category'] = 'Correcto';
        $_SESSION['message_type'] = 'success';
        header('Location: /veterinary-project/login.php');
    } else {
        $_SESSION['message'] = 'Ocurrió un error registrando su usuario';
        $_SESSION['message_category'] = 'Error';
        $_SESSION['message_type'] = 'warning';
        header("Location: /veterinary-project/index.php");
    }
}
?>
