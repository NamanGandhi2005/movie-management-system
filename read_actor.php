<?php
include('db_connection.php');

$sql = "SELECT * FROM Actor";
$stmt = $conn->query($sql);
$actors = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML to display the list of actors -->

