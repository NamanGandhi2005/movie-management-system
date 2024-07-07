<!DOCTYPE html>
<html>
<head>
    <title>Create Director</title>
</head>
<body>
    <h1>Create Director</h1>
    <form action="create_director.php" method="post">
        <label>Director ID:</label>
        <input type="text" name="director_id" required><br>

        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Birth Date:</label>
        <input type="date" name="birthdate" required><br>

        <label>Nationality:</label>
        <input type="text" name="nationality" required><br>

        <input type="submit" value="Create Director">
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
        $name = $_POST['name'];
        $birthdate = $_POST['birthdate'];
        $nationality = $_POST['nationality'];

        $sql = "INSERT INTO Director (DirectorID, Name, BirthDate, Nationality) VALUES (:director_id, :name, :birthdate, :nationality)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':director_id', $director_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':nationality', $nationality);

        if ($stmt->execute()) {
            echo "Director created successfully.";
        } else {
            echo "Error creating director.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
