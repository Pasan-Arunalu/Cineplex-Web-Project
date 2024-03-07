<?php
if (isset($_SESSION["username"])) {
    include("navbar_logged_in.php");
} else {
  include("navbarGuest.php");
}





      

      


