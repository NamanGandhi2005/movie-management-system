<!DOCTYPE html>
<html>
<head>
    <title>Update Director</title>
</head>
<body>
    <h1>Update Director</h1>
    <form action="update_director.php" method="post">
        <label>Director ID:</label>
        <input type="text" name="director_id" required><br>

        <!-- Include fields to update director information (Name, Birth Date, Nationality) -->
        
        <input type="submit" value="Update Director">
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

        $director_id = $_POST['director_id'];
        // Get other fields for update (Name, Birth Date, Nationality)

        $sql = "UPDATE Director SET Name = :name, BirthDate = :birthdate, Nationality = :nationality WHERE DirectorID = :director_id";
        $stmt = $conn->prepare($sql);
        // Bind parameters for update

        if ($stmt->execute()) {
            echo "Director updated successfully.";
        } else {
            echo "Error updating director.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
