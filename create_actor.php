<!DOCTYPE html>
<html>
<head>
    <title>Create Actor</title>
</head>
<body>
    <h1>Create Actor</h1>
    <form action="create_actor.php" method="post">
        <label>Actor ID:</label>
        <input type="text" name="actor_id" required><br>

        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Birth Date:</label>
        <input type="date" name="birthdate" required><br>

        <label>Nationality:</label>
        <input type="text" name="nationality" required><br>

        <input type="submit" value="Create Actor">
    </form>
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'dbms';

    try {
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $actor_id = $_POST['actor_id'];
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $nationality = $_POST['nationality'];

    $sql = "INSERT INTO Actor (ActorID, Name, BirthDate, Nationality) VALUES (:actor_id, :name, :birthdate, :nationality)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':actor_id', $actor_id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':birthdate', $birthdate);
    $stmt->bindParam(':nationality', $nationality);

    if ($stmt->execute()) {
        echo "Actor created successfully.";
    } else {
        echo "Error creating actor.";
    }

    $conn = null; // Close the database connection
}
?>
