<?php
// Include your database connection file
include_once('connection.php');

// Retrieve the movie title from the URL
$encodedMovieTitle = $_GET['movie']; 

// Decode the movie title for use in the database query
$decodedMovieTitle = urldecode($encodedMovieTitle);

// Fetch date and time slots for the specified movie
$sql = "SELECT DISTINCT booking_date, booking_time FROM bookings WHERE movie = '$decodedMovieTitle'";

$result = mysqli_query($conn, $sql);

if ($result) {
    // Output date and time slots as JSON for JavaScript to use
    $timeSlots = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $timeSlots[] = [
            'date' => $row['booking_date'],
            'time' => $row['booking_time']
        ];
    }

    echo json_encode($timeSlots);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

