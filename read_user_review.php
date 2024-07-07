<!DOCTYPE html>
<html>
<head>
    <title>User Review Table</title>
</head>
<body>
    <h1>User Review Table</h1>
    
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

    $sql = "SELECT * FROM UserReview";
    $stmt = $conn->query($sql);
    $userReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($userReviews) > 0) {
        echo "<table>";
        echo "<tr><th>User ID</th><th>Review ID</th><th>Movie ID</th><th>Rating</th></tr>";

        foreach ($userReviews as $userReview) {
            echo "<tr>";
            echo "<td>{$userReview['UserID']}</td>";
            echo "<td>{$userReview['ReviewID']}</td>";
            echo "<td>{$userReview['MovieID']}</td>";
            echo "<td>{$userReview['Rating']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No User Reviews found in the database.";
    }

    $conn = null; // Close the database connection
    ?>
</body>
</html>
