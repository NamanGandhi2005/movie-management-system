<!DOCTYPE html>
<html>
<head>
    <title>Delete Box-Office</title>
</head>
<body>
    <h1>Delete Box-Office</h1>
    <form action="delete_box_office.php" method="post">
        <label>Performance ID:</label>
        <input type="text" name="performance_id" required><br>

        <input type="submit" value="Delete Box-Office">
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

        $performance_id = $_POST['performance_id'];

        $sql = "DELETE FROM BoxOffice WHERE PerformanceID = :performance_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':performance_id', $performance_id);

        if ($stmt->execute()) {
            echo "Box-Office deleted successfully.";
        } else {
            echo "Error deleting Box-Office.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
