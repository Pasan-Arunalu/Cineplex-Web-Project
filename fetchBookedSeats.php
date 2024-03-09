<?php
include("connection.php"); // Make sure to include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Assuming you pass the booking_id as a query parameter
    $bookingId = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 0;

    // Fetch booked seats based on the booking_id
    $bookedSeats = getBookedSeats($bookingId);

    // Return the booked seats as JSON
    header('Content-Type: application/json');
    echo json_encode(['bookedSeats' => $bookedSeats]);
} else {
    // Handle invalid request method
    echo json_encode(['error' => 'Invalid request method.']);
}

function getBookedSeats($bookingId) {
    global $conn;

    $bookedSeats = [];

    // Fetch booked seats from the database based on the booking_id
    $query = "SELECT seats FROM bookings WHERE booking_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bookingId);
    $stmt->execute();
    $stmt->bind_result($seats);

    while ($stmt->fetch()) {
        // Split the seats string into an array
        $bookedSeats = explode(',', $seats);
    }

    $stmt->close();

    return $bookedSeats;
}

$conn->close();
?>
