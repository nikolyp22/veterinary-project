<?php

session_start();

if(!isset($_SESSION['role']) && $_SESSION['role'] != 'moderador') {
    header("Location: /veterinary-project/index.php");
}

require_once('../../database.php');
$conn = Connection::connect();

$id = $_GET['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'];

if(isset($_POST['update'])) {
    $update_user = $conn->prepare("UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id");
    $update_user->bindParam(':name', $name);
    $update_user->bindParam(':email', $email);
    $update_user->bindParam(':role', $role);
    $update_user->bindParam(':id', $id);
    $update_user->execute();
    $_SESSION['message'] = 'El usuario ha sido actualizado';
    $_SESSION['message_category'] = 'Correct';
    $_SESSION['message_type'] = 'success';
    header("Location: /veterinary-project/src/admin/dashboard.php");
} else {
}