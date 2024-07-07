<!DOCTYPE html>
<html>
<head>
    <title>Update User Review</title>
</head>
<body>
    <h1>Update User Review</h1>
    <form action="update_user_review.php" method="post">
        <label>User ID:</label>
        <input type="text" name="user_id" required><br>

        <label>Review ID:</label>
        <input type="text" name="review_id" required><br>

        <!-- Include fields to update user review information (Movie ID, Rating) -->
        
        <input type="submit" value="Update User Review">
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
        // Get other fields for update (Movie ID, Rating)

        $sql = "UPDATE UserReview SET MovieID = :movie_id, Rating = :rating WHERE UserID = :user_id AND ReviewID = :review_id";
        $stmt = $conn->prepare($sql);
        // Bind parameters for update

        if ($stmt->execute()) {
            echo "User Review updated successfully.";
        } else {
            echo "Error updating User Review.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
