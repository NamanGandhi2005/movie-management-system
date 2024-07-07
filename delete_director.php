<!DOCTYPE html>
<html>
<head>
    <title>Delete Director</title>
</head>
<body>
    <h1>Delete Director</h1>
    <form action="delete_director.php" method="post">
        <label>Director ID:</label>
        <input type="text" name="director_id" required><br>

        <input type="submit" value="Delete Director">
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

        $director_id = $_POST['director_id'];

        $sql = "DELETE FROM Director WHERE DirectorID = :director_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':director_id', $director_id);

        if ($stmt->execute()) {
            echo "Director deleted successfully.";
        } else {
            echo "Error deleting director.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
