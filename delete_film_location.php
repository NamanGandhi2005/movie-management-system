<!DOCTYPE html>
<html>
<head>
    <title>Delete Film Location</title>
</head>
<body>
    <h1>Delete Film Location</h1>
    <form action="delete_film_location.php" method="post">
        <label>Location ID:</label>
        <input type="text" name="location_id" required><br>

        <input type="submit" value="Delete Film Location">
    </form>

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

        $location_id = $_POST['location_id'];

        $sql = "DELETE FROM FilmLocation WHERE LocationID = :location_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':location_id', $location_id);

        if ($stmt->execute()) {
            echo "Film Location deleted successfully.";
        } else {
            echo "Error deleting Film Location.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
