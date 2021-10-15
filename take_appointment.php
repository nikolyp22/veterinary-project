<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /veterinary-project/index.php");
}

require_once 'database.php';
$conn = Connection::connect();

# Appointment data.
$service = $_POST['service'];
$pet = $_POST['pet'];

if (!empty($service || $pet)) {
    $save_appointment = $conn->prepare("INSERT INTO appointment (service, pet) VALUES (:service, :pet)");
    $save_appointment->bindParam(':service', $service);
    $save_appointment->bindParam(':pet', $pet);
    if ($save_appointment->execute()) {
        $_SESSION['message'] = 'Hemos registrado su cita';
        $_SESSION['message_category'] = 'Correcto';
        $_SESSION['message_type'] = 'success';
        header("Location: /veterinary-project/index.php");
    } else {
        $_SESSION['message'] = 'Hubo un error registrando su cita';
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