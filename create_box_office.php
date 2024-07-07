<!DOCTYPE html>
<html>
<head>
    <title>Create Box-Office</title>
</head>
<body>
    <h1>Create Box-Office</h1>
    <form action="create_box_office.php" method="post">
        <label>Performance ID:</label>
        <input type="text" name="performance_id" required><br>

        <label>Movie ID:</label>
        <input type="text" name="movie_id" required><br>

        <label>Region:</label>
        <input type="text" name="region" required><br>

        <label>Monthly Earnings:</label>
        <input type="text" name="monthly_earnings" required><br>

        <input type="submit" value="Create Box-Office">
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
        $movie_id = $_POST['movie_id'];
        $region = $_POST['region'];
        $monthly_earnings = $_POST['monthly_earnings'];

        $sql = "INSERT INTO BoxOffice (PerformanceID, MovieID, Region, MonthlyEarnings) VALUES (:performance_id, :movie_id, :region, :monthly_earnings)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':performance_id', $performance_id);
        $stmt->bindParam(':movie_id', $movie_id);
        $stmt->bindParam(':region', $region);
        $stmt->bindParam(':monthly_earnings', $monthly_earnings);

        if ($stmt->execute()) {
            echo "Box-Office created successfully.";
        } else {
            echo "Error creating Box-Office.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
