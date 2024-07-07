<!DOCTYPE html>
<html>
<head>
    <title>Award Table</title>
</head>
<body>
    <h1>Award Table</h1>
    
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

    $sql = "SELECT * FROM Awards";
    $stmt = $conn->query($sql);
    $awards = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($awards) > 0) {
        echo "<table>";
        echo "<tr><th>Award ID</th><th>Award Name</th><th>Category</th><th>Year</th><th>Winner</th></tr>";

        foreach ($awards as $award) {
            echo "<tr>";
            echo "<td>{$award['AwardID']}</td>";
            echo "<td>{$award['AwardName']}</td>";
            echo "<td>{$award['Category']}</td>";
            echo "<td>{$award['Year']}</td>";
            echo "<td>{$award['Winner']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No Awards found in the database.";
    }

    $conn = null; // Close the database connection
    ?>
</body>
</html>
