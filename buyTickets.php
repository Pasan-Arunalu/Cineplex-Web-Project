<?php
session_start();
include("connection.php");

// Fetch movie title and showtime_id from URL parameters
$title = isset($_GET['title']) ? urldecode($_GET['title']) : 'Unknown Movie';

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

<form class="ticketsForm" action="processBooking.php" method="post" onsubmit="return validateForm();">

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
            <label>Select Showtime:</label>
            <!-- Add your predefined showtimes as buttons here -->
            <button type="button" class="showtime-button" data-showtime-id="1">10:00 AM</button>
            <button type="button" class="showtime-button" data-showtime-id="2">2:00 PM</button>
            <button type="button" class="showtime-button" data-showtime-id="3">5:00 PM</button>
            <button type="button" class="showtime-button" data-showtime-id="4">8:00 PM</button>
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

            showtimeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    showtimeButtons.forEach(btn => btn.classList.remove('selected'));
                    this.classList.add('selected');
                    document.getElementById('selectedShowtimeInput').value = this.dataset.showtimeId;
                    updateBookButtonState();
                });
            });

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
        });

        function validateForm() {
            const selectedSeatsInput = document.getElementById('selectedSeatsInput').value;
            const selectedShowtimeInput = document.getElementById('selectedShowtimeInput').value;
            const selectedDate = document.getElementById('date').value;

            if (!selectedSeatsInput) {
                alert('Please select at least one seat.');
                return false;
            }

            if (!selectedShowtimeInput) {
                alert('Please select a showtime.');
                return false;
            }

            if (!selectedDate) {
                alert('Please select a date.');
                return false;
            }

            // Additional validation if needed

            return true;
        }
    </script>
</body>
</html>
