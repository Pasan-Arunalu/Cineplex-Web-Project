<?php
session_start();
include("connection.php");

include("caroFetch.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/moviesStyles.css">

    <title>Movies</title>
</head>

<body>
  
  <?php
    include ("navbar.php");
  ?>

  <div class="container text-center">
    <h2 class="nst">Movies on CINEPLEX</h2>
    <!-- row 1 -->
    <div class="row">
      <div class="col">
        <div class="moviescontainer">
          <div class="moviecard">
            <div class="movieimg">
              <img src="<?php echo $img7; ?>" alt="">
            </div>
            <div class="movietitle">
              <p><?php echo $title7; ?></p>
            </div>
            <div class="buy-tickets-btn">
            <a class="crdbtn2"
              href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title7) . '&showtime=' . urlencode($showtime7) . '&movie_id=' . urlencode($movieID7) : 'login.php'; ?>"><img src="img/svg/ticket-detailed.svg" 
              alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> <br> <br>
              <!-- <p>Small description for the movie</p> -->
            </div>
          </div>   
        </div>
      </div>
      <div class="col">
        <div class="moviescontainer">
          <div class="moviecard">
            <div class="movieimg">
              <img src="<?php echo $img8; ?>" alt="">
            </div>
            <div class="movietitle">
              <p><?php echo $title8; ?></p>
            </div>
            <div class="buy-tickets-btn">
            <a class="crdbtn2"
              href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title8) . '&showtime=' . urlencode($showtime8) . '&movie_id=' . urlencode($movieID8) : 'login.php'; ?>"><img src="img/svg/ticket-detailed.svg" 
              alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> <br> <br>
              <!-- <p>Small description for the movie</p> -->
            </div>
          </div>   
        </div>
      </div>
      <div class="col">
        <div class="moviescontainer">
          <div class="moviecard">
            <div class="movieimg">
              <img src="<?php echo $img9; ?>" alt="">
            </div>
            <div class="movietitle">
              <p><?php echo $title9; ?></p>
            </div>
            <div class="buy-tickets-btn">
            <a class="crdbtn2"
              href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title9) . '&showtime=' . urlencode($showtime9) . '&movie_id=' . urlencode($movieID9) : 'login.php'; ?>"><img src="img/svg/ticket-detailed.svg" 
              alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> <br> <br>
              <!-- <p>Small description for the movie</p> -->
            </div>
          </div>   
        </div>
      </div>
    </div>
    <!-- row 2 -->
    <div class="row">
      <div class="col">
        <div class="moviescontainer">
          <div class="moviecard">
            <div class="movieimg">
              <img src="<?php echo $img10; ?>" alt="">
            </div>
            <div class="movietitle">
              <p><?php echo $title10; ?></p>
            </div>
            <div class="buy-tickets-btn">
            <a class="crdbtn2"
              href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title10) . '&showtime=' . urlencode($showtime10) . '&movie_id=' . urlencode($movieID10) : 'login.php'; ?>"><img src="img/svg/ticket-detailed.svg" 
              alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> <br> <br>
              <!-- <p>Small description for the movie</p> -->
            </div>
          </div>   
        </div>
      </div>
      <div class="col">
        <div class="moviescontainer">
          <div class="moviecard">
            <div class="movieimg">
              <img src="<?php echo $img11; ?>" alt="">
            </div>
            <div class="movietitle">
              <p><?php echo $title11; ?></p>
            </div>
            <div class="buy-tickets-btn">
            <a class="crdbtn2"
              href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title11) . '&showtime=' . urlencode($showtime11) . '&movie_id=' . urlencode($movieID11) : 'login.php'; ?>"><img src="img/svg/ticket-detailed.svg" 
              alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> <br> <br>
              <!-- <p>Small description for the movie</p> -->
            </div>
          </div>   
        </div>
      </div>
      <div class="col">
        <div class="moviescontainer">
          <div class="moviecard">
            <div class="movieimg">
              <img src="<?php echo $img12; ?>" alt="">
            </div>
            <div class="movietitle">
              <p><?php echo $title12; ?></p>
            </div>
            <div class="buy-tickets-btn">
            <a class="crdbtn2"
              href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title12) . '&showtime=' . urlencode($showtime12) . '&movie_id=' . urlencode($movieID12) : 'login.php'; ?>"><img src="img/svg/ticket-detailed.svg" 
              alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> <br> <br>
              <!-- <p>Small description for the movie</p> -->
            </div>
          </div>   
        </div>
      </div>
    </div>
    <!-- row 3 -->
    <div class="row">
      <div class="col">
        <div class="moviescontainer">
          <div class="moviecard">
            <div class="movieimg">
              <img src="<?php echo $img13; ?>" alt="">
            </div>
            <div class="movietitle">
              <p><?php echo $title13; ?></p>
            </div>
            <div class="buy-tickets-btn">
            <a class="crdbtn2"
              href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title13) . '&showtime=' . urlencode($showtime13) . '&movie_id=' . urlencode($movieID13) : 'login.php'; ?>"><img src="img/svg/ticket-detailed.svg" 
              alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> <br> <br>
              <!-- <p>Small description for the movie</p> -->
            </div>
          </div>   
        </div>
      </div>
      <div class="col">
        <div class="moviescontainer">
          <div class="moviecard">
            <div class="movieimg">
              <img src="<?php echo $img14; ?>" alt="">
            </div>
            <div class="movietitle">
              <p><?php echo $title14; ?></p>
            </div>
            <div class="buy-tickets-btn">
            <a class="crdbtn2"
              href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title14) . '&showtime=' . urlencode($showtime14) . '&movie_id=' . urlencode($movieID14) : 'login.php'; ?>"><img src="img/svg/ticket-detailed.svg" 
              alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> <br> <br>
              <!-- <p>Small description for the movie</p> -->
            </div>
          </div>   
        </div>
      </div>
      <div class="col">
        <div class="moviescontainer">
          <div class="moviecard">
            <div class="movieimg">
              <img src="<?php echo $img15; ?>" alt="">
            </div>
            <div class="movietitle">
              <p><?php echo $title15; ?></p>
            </div>
            <div class="buy-tickets-btn">
            <a class="crdbtn2"
              href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title15) . '&showtime=' . urlencode($showtime15) . '&movie_id=' . urlencode($movieID15) : 'login.php'; ?>"><img src="img/svg/ticket-detailed.svg" 
              alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> <br> <br>
              <!-- <p>Small description for the movie</p> -->
            </div>
          </div>   
        </div>
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>