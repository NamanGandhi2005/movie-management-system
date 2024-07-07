<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <form action="update_user.php" method="post">
        <label>User ID:</label>
        <input type="text" name="user_id" required><br>

        <!-- Include fields to update user information (Username, Email, Password) -->
        
        <input type="submit" value="Update User">
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

        $user_id = $_POST['user_id'];
        // Get other fields for update (Username, Email, Password)

        $sql = "UPDATE User SET Username = :username, Email = :email, Password = :password WHERE UserID = :user_id";
        $stmt = $conn->prepare($sql);
        // Bind parameters for update

        if ($stmt->execute()) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
