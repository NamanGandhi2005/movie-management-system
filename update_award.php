<!DOCTYPE html>
<html>
<head>
    <title>Update Award</title>
</head>
<body>
    <h1>Update Award</h1>
    <form action="update_award.php" method="post">
        <label>Award ID:</label>
        <input type="text" name="award_id" required><br>

        <!-- Include fields to update award information (Award Name, Category, Year, Winner) -->
        
        <input type="submit" value="Update Award">
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
        // Get other fields for update (Award Name, Category, Year, Winner)

        $sql = "UPDATE Awards SET AwardName = :award_name, Category = :category, Year = :year, Winner = :winner WHERE AwardID = :award_id";
        $stmt = $conn->prepare($sql);
        // Bind parameters for update

        if ($stmt->execute()) {
            echo "Award updated successfully.";
        } else {
            echo "Error updating Award.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
