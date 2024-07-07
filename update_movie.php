<!-- update.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Update Movie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Update Movie</h1>
    <form method="post" action="update_movie.php">
        <label>Movie ID:</label>
        <input type="number" name="movie_id" required><br>
        
        <label>Title:</label>
        <input type="text" name="title"><br>
        
        <label>Release Date:</label>
        <input type="date" name="release_date"><br>
        
        <label>Genre:</label>
        <input type="text" name="genre"><br>
        
        <label>Rating (1-10):</label>
        <input type="number" name="rating" min="1" max="10"><br>
        
        <button type="submit">Update Movie</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>

<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $_POST['movie_id'];
    $title = $_POST['title'];
    $release_date = $_POST['release_date'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];

    $sql = "UPDATE Movie 
            SET Title = :title, ReleaseDate = :release_date, Genre = :genre, Rating = :rating
            WHERE MovieID = :movie_id";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':movie_id', $movie_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':release_date', $release_date);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':rating', $rating);

    if ($stmt->execute()) {
        header('Location: read_movie.php');
    } else {
        echo "Error updating movie.";
    }
}
?>
