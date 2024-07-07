<!DOCTYPE html>
<html>
<head>
    <title>User Table</title>
</head>
<body>
    <h1>User Table</h1>
    
    <?php
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

    $sql = "SELECT * FROM User";
    $stmt = $conn->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) > 0) {
        echo "<table>";
        echo "<tr><th>User ID</th><th>Username</th><th>Email</th><th>Password</th></tr>";

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['UserID']}</td>";
            echo "<td>{$user['Username']}</td>";
            echo "<td>{$user['Email']}</td>";
            echo "<td>{$user['Password']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No users found in the database.";
    }

    $conn = null; // Close the database connection
    ?>
</body>
</html>
