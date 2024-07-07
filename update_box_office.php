<!DOCTYPE html>
<html>
<head>
    <title>Update Box-Office</title>
</head>
<body>
    <h1>Update Box-Office</h1>
    <form action="update_box_office.php" method="post">
        <label>Performance ID:</label>
        <input type="text" name="performance_id" required><br>

        <!-- Include fields to update Box-Office information (Movie ID, Region, Monthly Earnings) -->
        
        <input type="submit" value="Update Box-Office">
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
        // Get other fields for update (Movie ID, Region, Monthly Earnings)

        $sql = "UPDATE BoxOffice SET MovieID = :movie_id, Region = :region, MonthlyEarnings = :monthly_earnings WHERE PerformanceID = :performance_id";
        $stmt = $conn->prepare($sql);
        // Bind parameters for update

        if ($stmt->execute()) {
            echo "Box-Office updated successfully.";
        } else {
            echo "Error updating Box-Office.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
