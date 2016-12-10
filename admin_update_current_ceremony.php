<?php
require_once("../includes/connection.php");

$current_ceremony = $_POST['current_ceremony'];

$query = "UPDATE ceremony SET is_current = 0 WHERE ceremony_number > 0";
$set_all_to_zero = mysqli_query($dbc, $query);

$query = "UPDATE ceremony SET is_current = 1 WHERE ceremony_number = $current_ceremony";
$set_current = mysqli_query($dbc, $query);

?>