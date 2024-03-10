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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    // Insert the feedback into the database
    $query_insert_feedback = "INSERT INTO feedback (user_id, feedback_text) VALUES ($user_id, '$feedback')";
    mysqli_query($conn, $query_insert_feedback);
}

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
        <h2>Welcome,
            <?php echo $user_data['username']; ?>
        </h2>

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
                <?php while ($booking = mysqli_fetch_assoc($result_bookings)): ?>
                    <tr>
                        <td>
                            <?php echo $booking['booking_id']; ?>
                        </td>
                        <td>
                            <?php echo $booking['movie_id']; ?>
                        </td>
                        <td>
                            <?php echo $booking['seats']; ?>
                        </td>
                        <td>
                            <?php echo $booking['booking_date']; ?>
                        </td>
                        <td>
                            <?php echo $booking['booking_time']; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Add the feedback form -->
        <div class="feedback-form">
            <h3 id="hhh">Provide Feedback or Ask Questions:</h3>
            <form action="profile.php" method="post">
                <!-- <label for="feedback">Your Feedback or Question:</label> -->
                <textarea name="feedback" id="feedback" rows="4" cols="50" placeholder="Your Feedback or Question:" required></textarea>

                <!-- You can add more fields as needed -->

                <br>

                <input type="submit" value="Submit Feedback">
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Cineplex Cinemas Kandy. All rights reserved.</p>
    </footer>

</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>