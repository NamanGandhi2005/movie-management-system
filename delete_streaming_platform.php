<!DOCTYPE html>
<html>
<head>
    <title>Delete Streaming Platform</title>
</head>
<body>
    <h1>Delete Streaming Platform</h1>
    <form action="delete_streaming_platform.php" method="post">
        <label>Platform ID:</label>
        <input type="text" name="platform_id" required><br>

        <input type="submit" value="Delete Streaming Platform">
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

        $platform_id = $_POST['platform_id'];

        $sql = "DELETE FROM StreamingPlatform WHERE PlatformID = :platform_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':platform_id', $platform_id);

        if ($stmt->execute()) {
            echo "Streaming Platform deleted successfully.";
        } else {
            echo "Error deleting Streaming Platform.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
