<!DOCTYPE html>
<html>
<head>
    <title>Update Actor</title>
</head>
<body>
    <h1>Update Actor</h1>
    <form action="update_actor.php" method="post">
        <label>Actor ID:</label>
        <input type="text" name="actor_id" required><br>

        <label>Name:</label>
        <input type="text" name="name"><br>

        <label>Birth Date:</label>
        <input type="date" name="birthdate"><br>

        <label>Nationality:</label>
        <input type="text" name="nationality"><br>

        <input type="submit" value="Update Actor">
    </form>
</body>
</html>



<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $actor_id = $_POST['actor_id'];
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $nationality = $_POST['nationality'];

    $sql = "UPDATE Actor 
            SET Name = :name, BirthDate = :birthdate, Nationality = :nationality
            WHERE ActorID = :actor_id";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':actor_id', $actor_id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':birthdate', $birthdate);
    $stmt->bindParam(':nationality', $nationality);

    if ($stmt->execute()) {
        header('Location: read_actor.php');
    } else {
        echo "Error updating actor.";
    }
}
?>
