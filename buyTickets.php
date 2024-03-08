<?php
// Start or resume the session
session_start();


// Check if the user is not logged in, redirect to the login page
if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['username'];
    // echo "User ID: $user_id";
} else {
    header("Location: login.php");
    exit();
}

include("connection.php");
include("caroFetch.php");


// Check if the title parameter is set in the URL
if (isset($_GET['title'])) {
    $movieTitle = urldecode($_GET['title']);

    // Get showtime information for the specific movie
    $showtimeInfo = getStartTimesForMovie($movieTitle);

    if ($showtimeInfo && isset($showtimeInfo['start_time'])) {
        $showtimeId = $showtimeInfo['showtime_id'];
        $startTime = $showtimeInfo['start_time'];
    } else {
        // Output more information about the issue
        $errorMessage = $showtimeInfo ? "start_time not found" : "Showtime information not found";
        echo "$errorMessage for movie: $movieTitle";
        // You can redirect the user or display an error message as needed
        exit();
    }
} else {
    // Handle the case when the title parameter is not set
    echo "Movie title not provided in the URL";
    // You can redirect the user or display an error message as needed
    exit();
}
echo "<script>selectedStartTime = '" . (isset($startTime) ? $startTime : '') . "';</script>";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/buyTicketsStyle.css">

    <title>Buy Tickets</title>

</head>

<body>  

    <?php
        include("navbar.php");
    ?>

    <div class="center">
      <div class="tickets">
        <div class="ticket-selector">
        <div class="head">
            <div class="title"><?php echo htmlspecialchars($movieTitle); ?></div>
          </div>
          <div class="seats">
            <div class="status">
              <div class="item">Available</div>
              <div class="item">Booked</div>
              <div class="item">Selected</div>
            </div>
            <div class="all-seats">
              <input type="checkbox" name="tickets" id="s1" />
              <label for="s1" class="seat booked"></label>
            </div>
          </div>
          <div class="timings">
            <div class="dates">
              <input type="radio" name="date" id="d1" checked />
              <label for="d1" class="dates-item">
                <div class="day">Sun</div>
                <div class="date">11</div>
              </label>
              <input type="radio" id="d2" name="date" />
              <label class="dates-item" for="d2">
                <div class="day">Mon</div>
                <div class="date">12</div>
              </label>
              <input type="radio" id="d3" name="date" />
              <label class="dates-item" for="d3">
                <div class="day">Tue</div>
                <div class="date">13</div>
              </label>
              <input type="radio" id="d4" name="date" />
              <label class="dates-item" for="d4">
                <div class="day">Wed</div>
                <div class="date">14</div>
              </label>
              <input type="radio" id="d5" name="date" />
              <label class="dates-item" for="d5">
                <div class="day">Thu</div>
                <div class="date">15</div>
              </label>
              <input type="radio" id="d6" name="date" />
              <label class="dates-item" for="d6">
                <div class="day">Fri</div>
                <div class="date">16</div>
              </label>
              <input type="radio" id="d7" name="date" />
              <label class="dates-item" for="d7">
                <div class="day">Sat</div>
                <div class="date">17</div>
              </label>
            </div>
            <div class="times">
              <input type="radio" name="time" id="t1" checked />
              <label for="t1" class="time">10:30</label>
              <input type="radio" id="t2" name="time" />
              <label for="t2" class="time"> 13:00 </label>
              <input type="radio" id="t3" name="time" />
              <label for="t3" class="time"> 16:00 </label>
              <input type="radio" id="t4" name="time" />
              <label for="t4" class="time"> 19:00 </label>
              <input type="radio" id="t5" name="time" />
              <label for="t5" class="time"> 21:30 </label>
            </div>
          </div>
        </div>
        <div class="price">
          <div class="total">
            <span> <span class="count">0</span> Tickets </span>
            <div class="amount">0</div>
          </div>
          <button type="button">Book</button>
        </div>
      </div>
    </div>
    
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let selectedStartTime = "<?php echo isset($startTime) ? substr($startTime, 0, 5) : ''; ?>";
        console.log('Selected Start Time:', selectedStartTime);

        let seats = document.querySelector(".all-seats");
        let amountElement = document.querySelector(".amount");
        let countElement = document.querySelector(".count");
        let movieTimes = document.querySelectorAll(".time");
        console.log('Movie Times:', movieTimes);

        for (let time of movieTimes) {
        let startTime = time.textContent.trim();

        if (startTime !== selectedStartTime) {
            time.classList.add("disabled-time");
        }
    }

        for (let i = 2; i <= 28; i++) {
            let randint = Math.floor(Math.random() * 2);
            let booked = randint === 1 ? "booked" : "";
            seats.insertAdjacentHTML(
                "beforeend",
                `<input type="checkbox" name="tickets" id="s${i}" />
                 <label for="s${i}" class="seat ${booked}">${i}</label>`
            );
        }

        let tickets = seats.querySelectorAll("input");
        tickets.forEach((ticket) => {
            ticket.addEventListener("change", updateAmount);
        });

        movieTimes.forEach((time) => {
            let startTime = time.textContent.trim().substring(0, 5);
            let isDisabled = startTime !== selectedStartTime;

            console.log('Start Time:', startTime, 'Disabled:', isDisabled);

            time.disabled = isDisabled;
        });

        function updateAmount() {
            let amount = 1000 * [...tickets].filter((ticket) => ticket.checked).length;
            let count = [...tickets].filter((ticket) => ticket.checked).length;

            amountElement.textContent = amount;
            countElement.textContent = count;
        }
    });
</script>

<script>
    // Assume PHP time format is HH:MM:SS, adjust as needed
    selectedStartTime = "<?php echo isset($startTime) ? substr($startTime, 0, 5) : ''; ?>";

    let times = document.querySelectorAll(".time");
    times.forEach((time) => {
        let startTime = time.textContent.trim();

        // Compare selected start time with available times
        if (startTime !== selectedStartTime) {
            time.disabled = true;
        }
    });
</script>

<script>
    console.log('JavaScript selectedStartTime: ' + JSON.stringify(selectedStartTime));
    // ... (rest of the JavaScript code)
</script>

</body>

</html>