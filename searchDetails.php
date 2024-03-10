<?php
session_start();
include("connection.php");
include("caroFetch.php");

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure that the query parameter is set
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Perform a search in your database based on the $searchQuery
    // Modify the WHERE clause to fetch movies with movie_id in the range of 7-15 or 16-21
    $sql = "SELECT * FROM movies WHERE title LIKE '%$searchQuery%' AND (movie_id BETWEEN 7 AND 15 OR movie_id BETWEEN 16 AND 21)";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/searchStyles.css">
    <title>Movie Search Results</title>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="movie-container">
        <?php
        // Display the movie details or a message if no results
        $nowShowings = false;
        $upcomings = false;

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="movie-details">';
                echo '<h2>' . $row['title'] . '</h2>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<img class="movie-poster" src="' . $row['image_path'] . '" alt="' . $row['title'] . '">';

                // Check the movie_id range and display accordingly
                if ($row['movie_id'] >= 7 && $row['movie_id'] <= 15) {
                    echo '<div class="btwtbutton-container">';
                    $ticketLink = isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($row['title']) . '&movie_id=' . urlencode($row['movie_id']) : 'login.php';
                    echo '<a class="buy-ticket-link" href="' . $ticketLink . '">Buy Tickets</a>';
                    echo '<a class="watch-trailer-link" href="watchTrailer.php?movie_id=' . urlencode($row['movie_id']) . '">Watch Trailer</a>';
                    echo '</div>';
                    $nowShowings = true;
                } elseif ($row['movie_id'] >= 16 && $row['movie_id'] <= 21) {
                    echo '<div class="btwtbutton-container">';
                    echo '<button class="buy-ticket-link-disabled" disabled>Coming Soon</button>';
                    echo '<a class="watch-trailer-link" href="watchTrailer.php?movie_id=' . urlencode($row['movie_id']) . '">Watch Trailer</a>';
                    echo '</div>';
                    $upcomings = true;
                }

                echo '</div>';
            }
        } else {
            echo '<p style="font-size:30px; color:snow;">No results found for your search.</p>';
        }
        ?>
    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
