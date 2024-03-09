<?php
session_start();
include("connection.php"); // Make sure to include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $movieId = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; // Assuming you have a user session

    $seats = isset($_POST['seats']) ? htmlspecialchars($_POST['seats']) : '';
    $bookingDate = isset($_POST['date']) ? htmlspecialchars($_POST['date']) : '';
    $bookingTime = isset($_POST['selectedShowtimeInput']) ? htmlspecialchars($_POST['selectedShowtimeInput']) : '';

    // Check if the selected seats are already booked
    if (areSeatsBooked($seats, $bookingDate, $bookingTime)) {
        echo "<script>alert('The selected seats are already booked. Please choose different seats.');
        window.location.href = 'index.php?booking_status=success';
        </script>";
    } else {
        // Insert data into the bookings table
        $query = "INSERT INTO bookings (movie_id, user_id, seats, booking_date, booking_time) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iisss", $movieId, $userId, $seats, $bookingDate, $bookingTime);

        if ($stmt->execute()) {
            // Booking successful
            echo "<script>
                    alert('Booking successful!');
                    window.location.href = 'index.php?booking_status=success';
                 </script>"; // Redirect to buyTickets.php with success status
        } else {
            // Booking failed
            echo "<script>
                    alert('Booking failed. Please try again later.');
                    window.location.href = 'index.php?booking_status=error';
                 </script>"; // Redirect to buyTickets.php with error status
        }

        $stmt->close();
    }

    $conn->close();
} else {
    // Handle invalid request method
    echo "<script>alert('Invalid request method.'); window.location.href = 'index.php';</script>";
}

function areSeatsBooked($seats, $bookingDate, $bookingTime) {
    global $conn;

    // Check if any of the selected seats are already booked for the specified date and time
    $query = "SELECT COUNT(*) FROM bookings WHERE seats IN (?) AND booking_date = ? AND booking_time = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $seats, $bookingDate, $bookingTime);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    return $count > 0;
}
?>
