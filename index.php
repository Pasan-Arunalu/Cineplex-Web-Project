<?php
// Start or resume a session
session_start();

include("connection.php");

include("caroFetch.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/navbarStyle.css">

    <link rel="stylesheet" href="css/indexStyle.css">

    <title>Cineplex - Buy Movie Tickets Online</title>

</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <!-- autoplaying carousel -->
    <div class="container-fluid">
        <div id="carouselautoplaying" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo $img1; ?>" class="d-block w-100" alt="...">
                    <div class="carouselchild">
                        <div class="btnscontainer">
                            <a class="crslbtn1"
                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title1) . '&showtime=' . urlencode($showtime1) . '&movie_id=' . urlencode($movieID1) : 'login.php'; ?>">

                                <img src="img/svg/ticket-detailed.svg" alt=""> Buy Tickets
                            </a>
                            <a class="crslbtn2" href="<?php echo $url1; ?>"><img src="img/svg/play-btn.svg" alt=""> Watch Trailer</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $img2; ?>" class="d-block w-100" alt="...">
                    <div class="carouselchild">
                        <div class="btnscontainer">
                            <a class="crslbtn1"
                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title2) . '&showtime=' . urlencode($showtime2) . '&movie_id=' . urlencode($movieID2) : 'login.php'; ?>">
                                <img src="img/svg/ticket-detailed.svg" alt=""> Buy Tickets
                            </a>
                            <a class="crslbtn2" href="<?php echo $url2; ?>"><img src="img/svg/play-btn.svg" alt=""> Watch Trailer</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $img3; ?>" class="d-block w-100" alt="...">
                    <div class="carouselchild">
                        <div class="btnscontainer">
                            <a class="crslbtn1"
                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title3) . '&showtime=' . urlencode($showtime3) . '&movie_id=' . urlencode($movieID3) : 'login.php'; ?>">
                                <img src="img/svg/ticket-detailed.svg" alt=""> Buy Tickets
                            </a>
                            <a class="crslbtn2" href="<?php echo $url3; ?>"><img src="img/svg/play-btn.svg" alt=""> Watch Trailer</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $img4; ?>" class="d-block w-100" alt="...">
                    <div class="carouselchild">
                        <div class="btnscontainer">
                            <a class="crslbtn1"
                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title4) . '&showtime=' . urlencode($showtime4) . '&movie_id=' . urlencode($movieID4) : 'login.php'; ?>">
                                <img src="img/svg/ticket-detailed.svg" alt=""> Buy Tickets
                            </a>
                            <a class="crslbtn2" href="<?php echo $url4; ?>"><img src="img/svg/play-btn.svg" alt=""> Watch Trailer</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $img5; ?>" class="d-block w-100" alt="...">
                    <div class="carouselchild">
                        <div class="btnscontainer">
                            <a class="crslbtn1"
                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title5) . '&showtime=' . urlencode($showtime5) . '&movie_id=' . urlencode($movieID5) : 'login.php'; ?>">
                                <img src="img/svg/ticket-detailed.svg" alt=""> Buy Tickets
                            </a>
                            <a class="crslbtn2" href="<?php echo $url5; ?>"><img src="img/svg/play-btn.svg" alt=""> Watch Trailer</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $img6; ?>" class="d-block w-100" alt="...">
                    <div class="carouselchild">
                        <div class="btnscontainer">
                            <a class="crslbtn1"
                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title6) . '&showtime=' . urlencode($showtime6) . '&movie_id=' . urlencode($movieID6) : 'login.php'; ?>">
                                <img src="img/svg/ticket-detailed.svg" alt=""> Buy Tickets
                            </a>
                            <a class="crslbtn2" href="<?php echo $url6; ?>"><img src="img/svg/play-btn.svg" alt=""> Watch Trailer</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselautoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselautoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- autoplaying carousel end -->

    <div class="nsanduc">
        <div class="nsuc">
            <button id="btnNowShowing" class="btnns">Now Showing</button>
            /
            <button id="btnUpcomings" class="btnuc">Up Comings</button>
        </div>
    </div>

    <!-- now showing carousel -->
    <div class="container-fluid">
        <div id="nscarousel" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#nscarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#nscarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#nscarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#nscarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>

            <div class="carousel-inner">
                <!-- slide 1 -->
                <div class="carousel-item active">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img7; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <a class="crdbtn2"
                                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title7) . '&showtime=' . urlencode($showtime7) . '&movie_id=' . urlencode($movieID7) : 'login.php'; ?>"><img
                                                    src="img/svg/ticket-detailed.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Buy Tickets</a>
                                            <a class="crdbtn2" href="<?php echo $url7; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img8; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <a class="crdbtn2"
                                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title8) . '&showtime=' . urlencode($showtime8) . '&movie_id=' . urlencode($movieID8) : 'login.php'; ?>"><img
                                                    src="img/svg/ticket-detailed.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Buy Tickets</a>
                                            <a class="crdbtn2" href="<?php echo $url8; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img9; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <a class="crdbtn2"
                                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title9) . '&showtime=' . urlencode($showtime9) . '&movie_id=' . urlencode($movieID9) : 'login.php'; ?>"><img
                                                    src="img/svg/ticket-detailed.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Buy Tickets</a>
                                            <a class="crdbtn2" href="<?php echo $url9; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--slide 2-->
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img10; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <a class="crdbtn2"
                                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title10) . '&showtime=' . urlencode($showtime10) . '&movie_id=' . urlencode($movieID10) : 'login.php'; ?>"><img
                                                    src="img/svg/ticket-detailed.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Buy Tickets</a>
                                            <a class="crdbtn2" href="<?php echo $url10; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img11; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <a class="crdbtn2"
                                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title11) . '&showtime=' . urlencode($showtime11) . '&movie_id=' . urlencode($movieID11) : 'login.php'; ?>"><img
                                                    src="img/svg/ticket-detailed.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Buy Tickets</a>
                                            <a class="crdbtn2" href="<?php echo $url11; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img12; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <a class="crdbtn2"
                                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title12) . '&showtime=' . urlencode($showtime12) . '&movie_id=' . urlencode($movieID12) : 'login.php'; ?>"><img
                                                    src="img/svg/ticket-detailed.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Buy Tickets</a>
                                            <a class="crdbtn2" href="<?php echo $url12; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--slide 3-->
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img13; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <a class="crdbtn2"
                                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title13) . '&showtime=' . urlencode($showtime13) . '&movie_id=' . urlencode($movieID13) : 'login.php'; ?>"><img
                                                    src="img/svg/ticket-detailed.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Buy Tickets</a>
                                            <a class="crdbtn2" href="<?php echo $url13; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img14; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <a class="crdbtn2"
                                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title14) . '&showtime=' . urlencode($showtime14) . '&movie_id=' . urlencode($movieID14) : 'login.php'; ?>"><img
                                                    src="img/svg/ticket-detailed.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Buy Tickets</a>
                                            <a class="crdbtn2" href="<?php echo $url14; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img15; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <a class="crdbtn2"
                                                href="<?php echo isset($_SESSION['username']) ? 'buyTickets.php?title=' . urlencode($title15) . '&showtime=' . urlencode($showtime15) . '&movie_id=' . urlencode($movieID15) : 'login.php'; ?>"><img
                                                    src="img/svg/ticket-detailed.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Buy Tickets</a>
                                            <a class="crdbtn2" href="<?php echo $url15; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--slide 4-->
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="row">
                            <div class="colsearch">
                                <div class="cardsearch">
                                    <div class="card-body-search">
                                        <form name="search" action="searchDetails.php" method="GET">
                                            <div class="input-group">
                                                <h3>Not finding what you are looking for?</h3>
                                                <div class="inputs">
                                                    <input class="searchinput" type="text" name="query"
                                                        placeholder="Search movies...">
                                                    <button class="searchicon" type="submit"><img
                                                            src="img/svg/search.svg" alt=""></button>
                                                    <br> <br>
                                                    <a href="movies.php" class="link-style-button">All Movies</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#nscarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#nscarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- upcomings carousel -->
    <div class="container-fluid">
        <div id="uccarousel" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#uccarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#uccarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#uccarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <!-- slide 1 -->
                <div class="carousel-item active">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div id="uccard-group" class="row">
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img16; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <!-- <a class="crdbtn1" href="javascript:redirectToBuyTickets()"><img src="img/svg/ticket-detailed.svg" alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> -->
                                            <a class="crdbtn2" href="<?php echo $url16; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img17; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <!-- <a class="crdbtn1" href="javascript:redirectToBuyTickets()"><img src="img/svg/ticket-detailed.svg" alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> -->
                                            <a class="crdbtn2" href="<?php echo $url17; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img18; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <!-- <a class="crdbtn1" href="javascript:redirectToBuyTickets()"><img src="img/svg/ticket-detailed.svg" alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> -->
                                            <a class="crdbtn2" href="<?php echo $url18; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--slide 2-->
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div id="uccard-group-1" class="row">
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img19; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <!-- <a class="crdbtn1" href="javascript:redirectToBuyTickets()"><img src="img/svg/ticket-detailed.svg" alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> -->
                                            <a class="crdbtn2" href="<?php echo $url19; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img20; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <!-- <a class="crdbtn1" href="javascript:redirectToBuyTickets()"><img src="img/svg/ticket-detailed.svg" alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> -->
                                            <a class="crdbtn2" href="<?php echo $url20; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $img21; ?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <div class="cardbtncontainer">
                                            <!-- <a class="crdbtn1" href="javascript:redirectToBuyTickets()"><img src="img/svg/ticket-detailed.svg" alt="" style="height:25px; width:25px; margin: 5px;">Buy Tickets</a> -->
                                            <a class="crdbtn2" href="<?php echo $url21; ?>"><img src="img/svg/play-btn.svg" alt=""
                                                    style="height:25px; width:25px; margin: 5px;">Watch Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--slide 3-->
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="row">
                            <div class="colsearch">
                                <div class="cardsearch">
                                    <div class="card-body-search">
                                        <form name="search" action="searchDetails.php" method="GET">
                                            <div class="input-group">
                                                <h3>Not finding what you are looking for?</h3>
                                                <div class="inputs">
                                                    <input class="searchinput" type="text" name="query"
                                                        placeholder="Search movies...">
                                                    <button class="searchicon" type="submit"><img
                                                            src="img/svg/search.svg" alt=""></button>
                                                    <br> <br>
                                                    <a href="movies.php" class="link-style-button">All Movies</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#uccarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#uccarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="container-fluid">
        <div class="adscontainer">
            <div class="ad1">
                <div class="ad1img">
                    <div class="imgchild1">

                    </div>
                </div>
                <div class="ad1dis">
                    <div class="dischild1">
                        <h2>
                            Popcorn cravings alert!
                        </h2> <br><br><br>
                        <h4>
                            Sink your teeth into sizzling deals with "bottomless popcorn weekends".
                            Quench your thirst with refreshing drinks at "combo discounts". Don't miss out, these offers
                            are poppin' hot!
                        </h4>
                    </div>
                </div>
            </div>
            <div class="ad2">
                <div class="ad2dis">
                    <div class="dischild2">
                        <h2>
                            Credit Card Offers!
                        </h2> <br><br><br>
                        <h4>
                            Swipe into savings! Elevate your everyday with "cashback rewards" on your credit card.
                            Unlock exclusive deals and discounts with any visa or master card.
                            Don't miss out, these offers are credit-ably irresistible!
                        </h4>
                    </div>
                </div>
                <div class="ad2img">
                    <div class="imgchild2">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="footercontainer">
            <div class="footerchild1">
                <ul class="footerlist">
                    <!-- <li class="fot-item">
                    <a class="fot-link " aria-current="page" href="#">Home</a>
                </li> -->
                    <li class="fot-item">
                        <a class="fot-link " href="movies.php">Movies</a>
                    </li>
                    <li class="fot-item">
                        <a class="fot-link " href="deals.php">Deals</a>
                    </li>
                    <li class="fot-item">
                        <a class="fot-link " href="about.php">About Us</a>
                    </li>
                    <li class="fot-item">
                        <a class="fot-link " href="contactus.php">Contact Us</a>
                    </li>
                </ul>
                <h5>&copy2022 Cineplex Cinemas All Rights Reserved. Developed by Pasan</h5>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>


    <script src="navbar.js"></script>


    <!-- need to be logged in to buy tickets -->
    <script>
        function redirectToBuyTickets() {
            <?php if (isset($_SESSION['username'])): ?>
                window.location.href = 'buyTickets.php';
            <?php else: ?>
                alert('Please log in to buy tickets.');
                // You can also redirect the user to the login page if needed
                // window.location.href = 'login.php';
            <?php endif; ?>
        }
    </script>

    <!-- script for toogle between nowshowing and upcomings carousel -->
    <script>
        $(document).ready(function () {
            $("#btnNowShowing").click(function () {
                $("#nscarousel").show();
                $("#uccarousel").hide();
                $(this).addClass("selected-link");
                $("#btnUpcomings").removeClass("selected-link");
            });

            $("#btnUpcomings").click(function () {
                $("#nscarousel").hide();
                $("#uccarousel").show();
                $(this).addClass("selected-link");
                $("#btnNowShowing").removeClass("selected-link");
            });
        });
    </script>
</body>

</html>