<!DOCTYPE html>
<html>
<head>
    <title>Update Film Location</title>
</head>
<body>
    <h1>Update Film Location</h1>
    <form action="update_film_location.php" method="post">
        <label>Location ID:</label>
        <input type="text" name="location_id" required><br>

        <!-- Include fields to update film location information (City, Country, Specific Location) -->
        
        <input type="submit" value="Update Film Location">
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

        $location_id = $_POST['location_id'];
        // Get other fields for update (City, Country, Specific Location)

        $sql = "UPDATE FilmLocation SET City = :city, Country = :country, SpecificLocation = :specific_location WHERE LocationID = :location_id";
        $stmt = $conn->prepare($sql);
        // Bind parameters for update

        if ($stmt->execute()) {
            echo "Film Location updated successfully.";
        } else {
            echo "Error updating Film Location.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
