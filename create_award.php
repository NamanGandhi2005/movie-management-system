

<!DOCTYPE html>
<html>
<head>
    <title>Create Award</title>
</head>
<body>
    <h1>Create Award</h1>
    <form action="create_award.php" method="post">
        <label>Award ID:</label>
        <input type="text" name="award_id" required><br>

        <label>Award Name:</label>
        <input type="text" name="award_name" required><br>

        <label>Category:</label>
        <input type="text" name="category" required><br>

        <label>Year:</label>
        <input type="text" name="year" required><br>

        <label>Winner:</label>
        <input type="text" name="winner" required><br>

        <input type="submit" value="Create Award">
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
        $award_name = $_POST['award_name'];
        $category = $_POST['category'];
        $year = $_POST['year'];
        $winner = $_POST['winner'];

        $sql = "INSERT INTO Awards (AwardID, AwardName, Category, Year, Winner) VALUES (:award_id, :award_name, :category, :year, :winner)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':award_id', $award_id);
        $stmt->bindParam(':award_name', $award_name);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':winner', $winner);

        if ($stmt->execute()) {
            echo "Award created successfully.";
        } else {
            echo "Error creating Award.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
