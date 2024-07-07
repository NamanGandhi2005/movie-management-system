<!DOCTYPE html>
<html>
<head>
    <title>Delete Actor</title>
</head>
<body>
    <h1>Delete Actor</h1>
    <form action="delete_actor.php" method="post">
        <label>Actor ID:</label>
        <input type="text" name="actor_id" required><br>

        <input type="submit" value="Delete Actor">
    </form>
</body>
</html>



<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $actor_id = $_POST['actor_id'];

    $sql = "DELETE FROM Actor WHERE ActorID = :actor_id";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':actor_id', $actor_id);

    if ($stmt->execute()) {
        header('Location: read_actor.php');
    } else {
        echo "Error deleting actor.";
    }
}
?>
