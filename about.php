<?php
    session_start();
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/aboutusStyles.css">
    <title>About Us - Cineplex Cinemas Kandy</title>

</head>

<body>
    <?php
        include("navbar.php");
    ?>

    <header>
        <h1>Cineplex Cinemas Kandy</h1>
    </header>

    <section>
        <h2>Welcome to Cineplex Cinemas Kandy!</h2>

        <p>
            At Cineplex Cinemas Kandy, we provide an exceptional cinematic experience for our valued audience. Our state-of-the-art facilities are designed to make your movie-watching experience unforgettable.
        </p>

        <h3>We Offer You :</h3>
        <ul>
            <li>
                2 Theatres - Offering both 3D and 2D screenings<br><br>
                <div class="theatres">
                    <div class="t1">

                    </div>
                    <div class="t2">

                    </div>
                </div>
            </li>
            <li>
                Dolby Atmos Sound - Immerse yourself in the rich and powerful audio experience<br><br>
                <div class="img1">

                </div>
            </li>
            <li>
                Parking Available - Hassle-free parking for your convenience<br><br>
                <div class="img2">

                </div>
            </li>
            <li>Newly Updated Theatres - Enjoy the latest in cinema technology and comfort</li>
        </ul>

        <p>
            Whether you're a movie enthusiast or just looking for a great time with friends and family, Cineplex Cinemas Kandy is the perfect destination. Join us for an incredible cinematic journey where every detail is designed to enhance your movie-watching pleasure.
        </p>
    </section>

    <footer>
        <p>&copy; 2024 Cineplex Cinemas Kandy. All rights reserved.</p>
    </footer>

</body>

</html>
