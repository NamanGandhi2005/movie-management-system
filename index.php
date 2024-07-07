<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operations</title>
    <style>
        #witi{
            color:white;
            background-color:black;
            width:800px;
            height:50px;
            text-align:center; 
        }
        #search{
            color:white;
            font-weight:900;
            font-size:35px;
            text-decoration:none;
            
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            margin: 0;
            padding: 0;
        }

        h1 {
            background: linear-gradient(to right, #333, #555);
            color: #fff;
            text-align: center;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }

        form {
            text-align: center;
            padding: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #333, #555);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #555, #777);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background: linear-gradient(to right, #333, #555);
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            background: linear-gradient(to right, #333, #555);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn:hover {
            background: linear-gradient(to right, #555, #777);
        }
    </style>
</head>
<body>
    <h1>MOVIES MANAGEMENT SYSTEM</h1>
    <div class="container">
    <div id="witi">
        <a id="search" href="universal_search.php">SEARCH</a>
    </div>
        <div class="card">
            <h2>Movies</h2>
            <a href="create_movie.php">Create Movie</a><br>
            <a href="read_movie.php">Read Movies</a><br>
            <a href="update_movie.php">Update Movie</a><br>
            <a href="delete_movie.php">Delete Movie</a>
        </div>
        <div class="card">
            <h2>Actors</h2>
            <a href="create_actor.php">Create Actor</a><br>
            <a href="read_actor.php">Read Actors</a><br>
            <a href="update_actor.php">Update Actor</a><br>
            <a href="delete_actor.php">Delete Actor</a>
        </div>
        <div class="card">
            <h2>Directors</h2>
            <a href="create_director.php">Create Director</a><br>
            <a href="read_director.php">Read Directors</a><br>
            <a href="update_director.php">Update Director</a><br>
            <a href="delete_director.php">Delete Director</a>
        </div>
        <div class="card">
            <h2>Users</h2>
            <a href="create_user.php">Create User</a><br>
            <a href="read_user.php">Read Users</a><br>
            <a href="update_user.php">Update User</a><br>
            <a href="delete_user.php">Delete User</a>
        </div>
        <div class="card">
            <h2>User Reviews</h2>
            <a href="create_user_review.php">Create User Review</a><br>
            <a href="read_user_review.php">Read User Reviews</a><br>
            <a href="update_user_review.php">Update User Review</a><br>
            <a href="delete_user_review.php">Delete User Review</a>
        </div>
        <div class="card">
            <h2>Awards</h2>
            <a href="create_award.php">Create Award</a><br>
            <a href="read_award.php">Read Awards</a><br>
            <a href="update_award.php">Update Award</a><br>
            <a href="delete_award.php">Delete Award</a>
        </div>
        <div class="card">
            <h2>Characters</h2>
            <a href="create_character.php">Create Character</a><br>
            <a href="read_character.php">Read Characters</a><br>
            <a href="update_character.php">Update Character</a><br>
            <a href="delete_character.php">Delete Character</a>
        </div>
        <div class="card">
            <h2>Film Locations</h2>
            <a href="create_film_location.php">Create Film Location</a><br>
            <a href="read_film_location.php">Read Film Locations</a><br>
            <a href="update_film_location.php">Update Film Location</a><br>
            <a href="delete_film_location.php">Delete Film Location</a>
        </div>
        <div class="card">
            <h2>Box Office</h2>
            <a href="create_box_office.php">Create Box Office</a><br>
            <a href="read_box_office.php">Read Box Offices</a><br>
            <a href="update_box_office.php">Update Box Office</a><br>
            <a href="delete_box_office.php">Delete Box Office</a>
        </div>
        <div class="card">
            <h2>Streaming Platforms</h2>
            <a href="create_streaming_platform.php">Create Streaming Platform</a><br>
            <a href="read_streaming_platform.php">Read Streaming Platforms</a><br>
            <a href="update_streaming_platform.php">Update Streaming Platform</a><br>
            <a href="delete_streaming_platform.php">Delete Streaming Platform</a>
        </div>
    </div>


    
</body>
</html>
