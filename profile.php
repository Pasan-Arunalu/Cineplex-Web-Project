<?php
// Include your database connection file
include('connection.php');

// Check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch user information from the users table
$user_id = $_SESSION['user_id'];
$query_user = "SELECT * FROM users WHERE user_id = $user_id";
$result_user = mysqli_query($conn, $query_user);
$user_data = mysqli_fetch_assoc($result_user);

// Fetch bookings for the logged-in user
$query_bookings = "SELECT * FROM bookings WHERE user_id = $user_id";
$result_bookings = mysqli_query($conn, $query_bookings);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profileStyles.css">
</head>
<body>
    <?php
        include("navbar.php");
    ?>
    <div class="wrapper">
<h2>Welcome, <?php echo $user_data['username']; ?>!</h2>

    <h3>Your Bookings:</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Movie ID</th>
                <th>Seats</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($booking = mysqli_fetch_assoc($result_bookings)) : ?>
                <tr>
                    <td><?php echo $booking['booking_id']; ?></td>
                    <td><?php echo $booking['movie_id']; ?></td>
                    <td><?php echo $booking['seats']; ?></td>
                    <td><?php echo $booking['booking_date']; ?></td>
                    <td><?php echo $booking['booking_time']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
    
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
