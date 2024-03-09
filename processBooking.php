<?php
session_start();

include("connection.php");
include("caroFetch.php");

// Assuming you have already validated and sanitized user inputs
$title = isset($_GET['title']) ? urldecode($_GET['title']) : 'Unknown Movie';
$movieId = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;
$date = isset($_POST['date']) ? $_POST['date'] : '';
$selectedSeats = isset($_POST['seats']) ? explode(',', $_POST['seats']) : [];

// Validate that at least one seat is selected
if (empty($selectedSeats)) {
    echo "Please select at least one seat.";
    exit;
}

// Assuming you have a valid user session
// Check if the user ID is set in the session
if (!isset($_SESSION['user_id'])) {
    echo "Error: User ID not found in the session.";
    // You might want to redirect the user to a login page or handle the error in some way
    exit;
}

// Set the user ID from the session
$user_id = $_SESSION['user_id'];

// Continue with the rest of your code...

// Check if the user exists
$checkUserQuery = "SELECT user_id FROM users WHERE user_id = '$user_id'";
$resultCheckUser = mysqli_query($conn, $checkUserQuery);

if (!$resultCheckUser || mysqli_num_rows($resultCheckUser) == 0) {
    echo "Error: User does not exist. User ID: $user_id";
    // Add debugging information
    echo "<pre>";
    print_r($_SESSION); // Print session data
    echo "</pre>";
    exit;
}

// Retrieve showtime ID from the database based on user-selected movie ID
$getShowtimeQuery = "SELECT m.showtime_id
                     FROM movies m
                     WHERE m.movie_id = '$movieId'";

$resultGetShowtime = mysqli_query($conn, $getShowtimeQuery);

if (!$resultGetShowtime) {
    echo "Error in fetching showtime: " . mysqli_error($conn);
    exit;
}

$row = mysqli_fetch_assoc($resultGetShowtime);

// Debugging: Echo the actual row
echo "Fetched Row: ";
print_r($row);

// Check if a row is retrieved before accessing the 'showtime_id'
if ($row && isset($row['showtime_id'])) {
    $selectedShowtimeId = $row['showtime_id'];

    // Continue with the rest of your code...
} else {
    echo "Error: No matching showtime found for the provided movie.";
    // Additional debugging information
    echo "<pre>";
    print_r($resultGetShowtime); // Print query result
    echo "</pre>";
}


// Check if a row is retrieved before accessing the 'showtime_id'
if ($row && isset($row['showtime_id'])) {
    $selectedShowtimeId = $row['showtime_id'];

    // Insert data into reserved_seats table
    $queryReservedSeats = "INSERT INTO reserved_seats (user_id, showtime_id, date, seat_numbers)
                           VALUES ('$user_id', '$selectedShowtimeId', '$date', '" . implode(",", $selectedSeats) . "')";

    $resultReservedSeats = mysqli_query($conn, $queryReservedSeats);

    if (!$resultReservedSeats) {
        echo "Error in reserving seats: " . mysqli_error($conn);
        exit;
    }

    // Insert data into bookings table
    $queryBooking = "INSERT INTO bookings (movie_id, user_id, seats, booking_date, booking_time)
                     VALUES ('$movieId', '$user_id', '" . implode(",", $selectedSeats) . "', NOW(), NOW())";

    $resultBooking = mysqli_query($conn, $queryBooking);

    if (!$resultBooking) {
        echo "Error in booking: " . mysqli_error($conn);
        // You may want to roll back the reserved seats transaction here
        exit;
    }

    echo "Booking successful!";
} else {
    // Debugging: Echo the actual row
    echo "Fetched Row: ";
    print_r($row);

    echo "Error: No matching showtime found for the provided movie.";
}

// Close database connection
mysqli_close($conn);
?>
