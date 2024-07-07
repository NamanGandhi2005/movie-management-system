<!DOCTYPE html>
<html>
<head>
    <title>Create Film Location</title>
</head>
<body>
    <h1>Create Film Location</h1>
    <form action="create_film_location.php" method="post">
        <label>Location ID:</label>
        <input type="text" name="location_id" required><br>

        <label>City:</label>
        <input type="text" name="city" required><br>

        <label>Country:</label>
        <input type="text" name="country" required><br>

        <label>Specific Location:</label>
        <input type="text" name="specific_location" required><br>

        <input type="submit" value="Create Film Location">
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
        $city = $_POST['city'];
        $country = $_POST['country'];
        $specific_location = $_POST['specific_location'];

        $sql = "INSERT INTO FilmLocation (LocationID, City, Country, SpecificLocation) VALUES (:location_id, :city, :country, :specific_location)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':location_id', $location_id);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':specific_location', $specific_location);

        if ($stmt->execute()) {
            echo "Film Location created successfully.";
        } else {
            echo "Error creating Film Location.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
