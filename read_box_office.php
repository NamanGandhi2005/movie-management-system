<!DOCTYPE html>
<html>
<head>
    <title>Box-Office Table</title>
</head>
<body>
    <h1>Box-Office Table</h1>
    
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

    $sql = "SELECT * FROM BoxOffice";
    $stmt = $conn->query($sql);
    $boxOffices = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($boxOffices) > 0) {
        echo "<table>";
        echo "<tr><th>Performance ID</th><th>Movie ID</th><th>Region</th><th>Monthly Earnings</th></tr>";

        foreach ($boxOffices as $boxOffice) {
            echo "<tr>";
            echo "<td>{$boxOffice['PerformanceID']}</td>";
            echo "<td>{$boxOffice['MovieID']}</td>";
            echo "<td>{$boxOffice['Region']}</td>";
            echo "<td>{$boxOffice['MonthlyEarnings']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No Box-Office records found in the database.";
    }

    $conn = null; // Close the database connection
    ?>
</body>
</html>
