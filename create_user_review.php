<!DOCTYPE html>
<html>
<head>
    <title>Create User Review</title>
</head>
<body>
    <h1>Create User Review</h1>
    <form action="create_user_review.php" method="post">
        <label>User ID:</label>
        <input type="text" name="user_id" required><br>

        <label>Review ID:</label>
        <input type="text" name="review_id" required><br>

        <label>Movie ID:</label>
        <input type="text" name="movie_id" required><br>

        <label>Rating (1-10):</label>
        <input type="number" name="rating" min="1" max="10" required><br>

        <input type="submit" value="Create User Review">
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
        $review_id = $_POST['review_id'];
        $movie_id = $_POST['movie_id'];
        $rating = $_POST['rating'];

        $sql = "INSERT INTO UserReview (UserID, ReviewID, MovieID, Rating) VALUES (:user_id, :review_id, :movie_id, :rating)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':review_id', $review_id);
        $stmt->bindParam(':movie_id', $movie_id);
        $stmt->bindParam(':rating', $rating);

        if ($stmt->execute()) {
            echo "User Review created successfully.";
        } else {
            echo "Error creating User Review.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
