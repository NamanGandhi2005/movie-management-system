<!DOCTYPE html>
<html>
<head>
    <title>Delete User Review</title>
</head>
<body>
    <h1>Delete User Review</h1>
    <form action="delete_user_review.php" method="post">
        <label>User ID:</label>
        <input type="text" name="user_id" required><br>

        <label>Review ID:</label>
        <input type="text" name="review_id" required><br>

        <input type="submit" value="Delete User Review">
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

        $sql = "DELETE FROM UserReview WHERE UserID = :user_id AND ReviewID = :review_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':review_id', $review_id);

        if ($stmt->execute()) {
            echo "User Review deleted successfully.";
        } else {
            echo "Error deleting User Review.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
