<!DOCTYPE html>
<html>
<head>
    <title>Universal Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        form {
            text-align: center;
            margin: 20px auto;
            width: 50%;
        }

        label {
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        h2 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-top: 20px;
            text-align:center;
        }

        p {
            margin: 10px 0;
            text-align:center;
            font-weight:900;
        }
    </style>
</head>
<body>
    <h1>Universal Search</h1>
    <form action="universal_search.php" method="post">
        <label>Enter Movie Name:</label>
        <input type="text" name="movie_name" required>
        <input type="submit" value="Search">
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

        $movie_name = $_POST['movie_name'];

        // Step 1: Search for the movie by its name
        $movie_query = "SELECT * FROM Movie WHERE Title = :movie_name";
        $movie_stmt = $conn->prepare($movie_query);
        $movie_stmt->bindParam(':movie_name', $movie_name);
        $movie_stmt->execute();
        $movie = $movie_stmt->fetch(PDO::FETCH_ASSOC);

        if ($movie) {
            echo "<h2>Movie Details:</h2>";
            echo "<p>Movie ID: " . $movie['MovieID'] . "</p>";
            echo "<p>Release Date: " . $movie['ReleaseDate'] . "</p>";
            echo "<p>Genre: " . $movie['Genre'] . "</p>";
            echo "<p>Rating: " . $movie['Rating'] . "</p>";

            // Step 2: Retrieve related data using foreign keys
            $user_review_query = "SELECT * FROM UserReview WHERE MovieID = :movie_id";
            $user_review_stmt = $conn->prepare($user_review_query);
            $user_review_stmt->bindParam(':movie_id', $movie['MovieID']);
            $user_review_stmt->execute();
            $user_reviews = $user_review_stmt->fetchAll(PDO::FETCH_ASSOC);

            $box_office_query = "SELECT * FROM BoxOffice WHERE MovieID = :movie_id";
            $box_office_stmt = $conn->prepare($box_office_query);
            $box_office_stmt->bindParam(':movie_id', $movie['MovieID']);
            $box_office_stmt->execute();
            $box_offices = $box_office_stmt->fetchAll(PDO::FETCH_ASSOC);

            $streaming_platform_query = "SELECT * FROM StreamingPlatform WHERE MovieID = :movie_id";
            $streaming_platform_stmt = $conn->prepare($streaming_platform_query);
            $streaming_platform_stmt->bindParam(':movie_id', $movie['MovieID']);
            $streaming_platform_stmt->execute();
            $streaming_platforms = $streaming_platform_stmt->fetchAll(PDO::FETCH_ASSOC);

            // Step 3: Display related information
            echo "<h2>User Reviews:</h2>";
            foreach ($user_reviews as $review) {
                echo "<p>Review ID: " . $review['ReviewID'] . "</p>";
                echo "<p>Rating: " . $review['Rating'] . "</p>";
                // Display other review details as needed
            }

            echo "<h2>Box Office Data:</h2>";
            foreach ($box_offices as $box_office) {
                echo "<p>Performance ID: " . $box_office['PerformanceID'] . "</p>";
                echo "<p>Region: " . $box_office['Region'] . "</p>";
                echo "<p>Monthly Earnings: " . $box_office['MonthlyEarnings'] . "</p>";
                // Display other box office details as needed
            }

            echo "<h2>Streaming Platforms:</h2>";
            foreach ($streaming_platforms as $platform) {
                echo "<p>Platform Name: " . $platform['PlatformName'] . "</p>";
                echo "<p>Availability Start Date: " . $platform['AvailabilityStartDate'] . "</p>";
                echo "<p>Languages: " . $platform['Languages'] . "</p>";
                // Display other platform details as needed
            }
        } else {
            echo "Movie not found.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
