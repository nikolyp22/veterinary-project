<?php

session_start();

if(!isset($_SESSION['role']) && $_SESSION['role'] != 'moderador') {
    header("Location: /veterinary-project/index.php");
}

require_once('../../database.php');
$conn = Connection::connect();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_user = $conn->prepare("DELETE FROM users WHERE id = :id");
    $delete_user->bindParam(':id', $id);
    $delete_user->execute();
    $_SESSION['message'] = 'El usuario ha sido eliminado del sistema';
    $_SESSION['message_category'] = 'Correct';
    $_SESSION['message_type'] = 'success';
    header("Location: /veterinary-project/src/admin/dashboard.php");
} else {
    header("Location: /veterinary-project/index.php");
}