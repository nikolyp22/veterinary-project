<?php

require 'database.php';

$message = '';
$conn = Connection::connect();

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = 'Successfully created new user';
        header('Location: /veterinary-project');
    } else {
        $message = 'Sorry there must have been an issue creating your account';
    }
}
?>
