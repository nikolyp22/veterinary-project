<?php

session_start();

if(!isset($_SESSION['role']) && $_SESSION['role'] != 'moderador') {
    header("Location: /veterinary-project/index.php");
}

require_once('../../database.php');
$conn = Connection::connect();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_appointment = $conn->prepare("DELETE FROM appointments WHERE id = :id");
    $delete_appointment->bindParam(':id', $id);
    $delete_appointment->execute();
    $_SESSION['message'] = 'Hemos cancelado la cita';
    $_SESSION['message_category'] = 'Correct';
    $_SESSION['message_type'] = 'success';
    header("Location: /veterinary-project/src/admin/dashboard.php");
} else {
    header("Location: /veterinary-project/index.php");
}