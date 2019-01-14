<?php 
session_star();

unset($_SESSION['banco']);
header("Location: login.php");
exit;

?>