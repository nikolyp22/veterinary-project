<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /veterinary-project/index.php');
?>
