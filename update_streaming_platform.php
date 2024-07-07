<!DOCTYPE html>
<html>
<head>
    <title>Update Streaming Platform</title>
</head>
<body>
    <h1>Update Streaming Platform</h1>
    <form action="update_streaming_platform.php" method="post">
        <label>Platform ID:</label>
        <input type="text" name="platform_id" required><br>

        <!-- Include fields to update Streaming Platform information (Movie ID, Platform Name, Availability Start Date, Languages) -->
        
        <input type="submit" value="Update Streaming Platform">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'dbms';

        try {
            $conn = aPDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $platform_id = $_POST['platform_id'];
        // Get other fields for update (Movie ID, Platform Name, Availability Start Date, Languages)

        $sql = "UPDATE StreamingPlatform SET MovieID = :movie_id, PlatformName = :platform_name, AvailibilityStartDate = :availability_start_date, Languages = :languages WHERE PlatformID = :platform_id";
        $stmt = $conn->prepare($sql);
        // Bind parameters for update

        if ($stmt->execute()) {
            echo "Streaming Platform updated successfully.";
        } else {
            echo "Error updating Streaming Platform.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
