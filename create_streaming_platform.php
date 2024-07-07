<!DOCTYPE html>
<html>
<head>
    <title>Create Streaming Platform</title>
</head>
<body>
    <h1>Create Streaming Platform</h1>
    <form action="create_streaming_platform.php" method="post">
        <label>Platform ID:</label>
        <input type="text" name="platform_id" required><br>

        <label>Movie ID:</label>
        <input type="text" name="movie_id" required><br>

        <label>Platform Name:</label>
        <input type="text" name="platform_name" required><br>

        <label>Availability Start Date:</label>
        <input type="text" name="availability_start_date" required><br>

        <label>Languages:</label>
        <input type="text" name="languages" required><br>

        <input type="submit" value="Create Streaming Platform">
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
        $movie_id = $_POST['movie_id'];
        $platform_name = $_POST['platform_name'];
        $availability_start_date = $_POST['availability_start_date'];
        $languages = $_POST['languages'];

        $sql = "INSERT INTO StreamingPlatform (PlatformID, MovieID, PlatformName, AvailibilityStartDate, Languages) VALUES (:platform_id, :movie_id, :platform_name, :availability_start_date, :languages)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':platform_id', $platform_id);
        $stmt->bindParam(':movie_id', $movie_id);
        $stmt->bindParam(':platform_name', $platform_name);
        $stmt->bindParam(':availability_start_date', $availability_start_date);
        $stmt->bindParam(':languages', $languages);

        if ($stmt->execute()) {
            echo "Streaming Platform created successfully.";
        } else {
            echo "Error creating Streaming Platform.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
