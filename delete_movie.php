<!-- delete.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Delete Movie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Delete Movie</h1>
    <form method="post" action="delete_movie.php">
        <label>Movie ID:</label>
        <input type="number" name="movie_id" required><br>
        <button type="submit">Delete Movie</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>

<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $_POST['movie_id'];

    $sql = "DELETE FROM Movie WHERE MovieID = :movie_id";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':movie_id', $movie_id);

    if ($stmt->execute()) {
        header('Location: read_movie.php');
    } else {
        echo "Error deleting movie.";
    }
}
?>
