<?php
include("connection.php");
include("caroFetch.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $movie_id = $_POST["movie_id"]; // Make sure to have this value available
    $user_id = $_POST["user_id"]; // You may get this from user authentication
    $seats = implode(",", $_POST["selected_seats"]); // Convert array to string
    $booking_date = $_POST["date"];
    $booking_time = $_POST["booking_time"]; // Assuming you have this value
    
    // Validate and sanitize data as needed before inserting into the database

    // Insert data into the movies table
    $query = "INSERT INTO bookings (movie_id, user_id, seats, booking_date, booking_time) 
              VALUES ('$movie_id', '$user_id', '$seats', '$booking_date', '$booking_time')";
   
    if ($result) {
        // Booking successful
        echo "Booking successful!";
    } else {
        // Handle the error
        echo "Error: " . mysqli_error($conn);
    }
mysqli_close($conn);
}


