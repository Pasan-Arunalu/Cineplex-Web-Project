<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/dealsStyle.css">
    <title>Cineplex - deals</title>
    
</head>
<body>
<?php
    include("navbar.php");
?>
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

    <footer>
        <p>&copy; 2024 Cineplex Cinemas Kandy. All rights reserved.</p>
    </footer>
</body>
</html>