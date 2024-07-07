<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Add Movie</h1>
    <form method="post" action="create_movie.php">
        <label>ID:</label>
        <input type="number" name="movieid" required><br>

        <label>Title:</label>
        <input type="text" name="title" required><br>

        <label>Release Date:</label>
        <input type="date" name="release_date" required><br>

        <label>Genre:</label>
        <input type="text" name="genre"><br>

        <label>Rating (1-10):</label>
        <input type="number" name="rating" min="1" max="10" required><br>

        <button type="submit">Add Movie</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>

<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieid=$_POST['movieid'];
    $title = $_POST['title'];
    $release_date = $_POST['release_date'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO Movie ( MovieID,Title, ReleaseDate, Genre, Rating) VALUES (:movieid,:title, :release_date, :genre, :rating)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':movieid', $movieid);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':release_date', $release_date);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':rating', $rating);

    if ($stmt->execute()) {
        header('Location: read_movie.php');
    } else {
        echo "Error adding movie.";
    }
}
?>
