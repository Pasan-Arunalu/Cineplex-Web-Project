<?php
session_start();
include("connection.php");

if (isset($_GET['movie_id'])) {
    $movieId = intval($_GET['movie_id']);

    // Fetch the video_url based on the movie ID
    $stmt = $conn->prepare("SELECT video_url FROM movies WHERE movie_id = ?");
    $stmt->bind_param("i", $movieId);
    $stmt->execute();
    $stmt->bind_result($videoUrl);
    $stmt->fetch();
    $stmt->close();

    // Redirect the user to the YouTube page
    if (!empty($videoUrl)) {
        header("Location: $videoUrl");
        exit();
    } else {
        echo "Video URL not available.";
    }
} else {
    echo "Invalid movie ID.";
}

// Close the database connection
$conn->close();
