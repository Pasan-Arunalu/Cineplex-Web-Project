<?php
session_start();
include("connection.php");
include("caroFetch.php");

// Fetch movie title and showtime_id from URL parameters
$title = isset($_GET['title']) ? urldecode($_GET['title']) : 'Unknown Movie';
$selectedShowtimeId = isset($_GET['showtime']) ? intval($_GET['showtime']) : 0;

$movieId = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;

// Fetch all showtimes for the movie
$queryAllShowtimes = "SELECT showtime_id, start_time 
                      FROM showtime
                      WHERE showtime_id IN (SELECT showtime_id FROM movies WHERE movie_id = $movieId)";
$resultAllShowtimes = mysqli_query($conn, $queryAllShowtimes);

// Check if showtimes are available
$showtimes = [];
if ($resultAllShowtimes && mysqli_num_rows($resultAllShowtimes) > 0) {
    while ($rowAllShowtimes = mysqli_fetch_assoc($resultAllShowtimes)) {
        $showtimes[] = $rowAllShowtimes;
    }
}


// Fetch all showtimes for the movie
$queryAllShowtimes = "SELECT showtime.showtime_id, showtime.start_time 
                      FROM showtime
                      WHERE showtime.showtime_id IN (SELECT showtime_id FROM movies WHERE movie_id = $movieId)";
$resultAllShowtimes = mysqli_query($conn, $queryAllShowtimes);

// Check if showtimes are available
$showtimes = [];
if ($resultAllShowtimes && mysqli_num_rows($resultAllShowtimes) > 0) {
    while ($rowAllShowtimes = mysqli_fetch_assoc($resultAllShowtimes)) {
        $showtimes[] = $rowAllShowtimes;
    }
} else {
    echo "No showtimes found for the selected movie.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/buyTicketsStyle.css">
    <title>Movie Ticket Booking</title>


</head>

<body>

<?php
    include("navbar.php");
?>

<div id="titlecontainer">
    <h1 class="title"><?php echo $title; ?></h1>
    <h5 class="title2">Book Your Tickets</h5>
</div>

<form class="ticketsForm" action="processBooking.php" method="post">
    <div id="seat-map-container">
        <div id="seat-map">
            <input type="hidden" name="seats" id="selectedSeatsInput" value="">
        </div>
        <div id="screen">screen</div>
    </div>

    <div class="date-showtime-container">
        <div class="date-selector">
            <label for="date">Select Date :</label>
            <input type="date" id="date" name="date" required>
        </div>

        <div class="showtime-display">
            <?php foreach ($showtimes as $showtime) : ?>
                <span class="showtime-display-item">
                    Showtime : <?php echo $showtime['start_time'];  ?> 
                </span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-controls">
        <button type="submit" class="btnbook">Book Tickets</button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const seatMap = document.getElementById('seat-map');
        const showtimeButtons = document.querySelectorAll('.showtime-button');
        const selectedSeats = new Set();
        let selectedShowtime = null;

        // Define the number of rows and columns
        const rows = 5;
        const cols = 6;

        // Generate seats dynamically
        for (let row = 1; row <= rows; row++) {
            for (let col = 1; col <= cols; col++) {
                const seat = document.createElement('div');
                seat.className = 'seat';
                seat.dataset.seat = `${String.fromCharCode(64 + row)}${col}`;
                seat.textContent = seat.dataset.seat;

                seat.addEventListener('click', function () {
                    this.classList.toggle('selected');
                    updateSelectedSeats();
                });

                seatMap.appendChild(seat);
            }
        }

        function updateSelectedSeats() {
        selectedSeats.clear();
        const selectedSeatElements = document.querySelectorAll('.seat.selected');
        selectedSeatElements.forEach(seat => {
        selectedSeats.add(seat.dataset.seat);
        });

    // Update the value of the hidden input field
    document.getElementById('selectedSeatsInput').value = Array.from(selectedSeats).join(',');
    updateBookButtonState();
}


        function updateBookButtonState() {
            const bookButton = document.querySelector('.btnbook');
            bookButton.disabled = selectedSeats.size === 0 || selectedDate === null;
        }

        function validateForm() {
            if (selectedSeats.size === 0) {
                alert('Please select at least one seat.');
                return false;
            }
            if (selectedShowtime === null) {
                alert('Please select a showtime.');
                return false;
            }
            return true;
        }
    });
</script>
</body>
</html>
