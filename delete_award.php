<!DOCTYPE html>
<html>
<head>
    <title>Delete Award</title>
</head>
<body>
    <h1>Delete Award</h1>
    <form action="delete_award.php" method="post">
        <label>Award ID:</label>
        <input type="text" name="award_id" required><br>

        <input type="submit" value="Delete Award">
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

        $award_id = $_POST['award_id'];

        $sql = "DELETE FROM Awards WHERE AwardID = :award_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':award_id', $award_id);

        if ($stmt->execute()) {
            echo "Award deleted successfully.";
        } else {
            echo "Error deleting Award.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
