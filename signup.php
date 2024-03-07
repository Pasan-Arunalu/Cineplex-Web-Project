<?php
include("connection.php");

if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($conn, $_POST["user"]);
    $password = mysqli_real_escape_string($conn, $_POST["pass"]);
    $passwordConfirm = mysqli_real_escape_string($conn, $_POST["pass_confirm"]);

    // Perform additional validation if needed
    if (empty($username) || empty($password) || empty($passwordConfirm)) {
        $_SESSION["error"] = "Username, password, and password confirmation are required.";
        exit();
    }

    // Check if the password and password confirmation match
    if ($password !== $passwordConfirm) {
        $_SESSION["error"] = "Password and password confirmation do not match.";
        exit();
    }

    // Insert the user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["success"] = "User registered successfully, <br>Please Login";
    } else {
        $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/signupStyle.css">

    <title>Sign Up</title>
</head>

<body>

    <?php
        include ("navbar.php");
    ?>

    <div class="signupform">
        <?php
            // Display error message if set in the session
            if (isset($_SESSION["error"])) {
                echo "<p style='color: red;'>" . $_SESSION["error"] . "</p>";
                unset($_SESSION["error"]); // Clear the error message
            } else if (isset($_SESSION["success"])) {
                echo "<p style='color: green;'>" . $_SESSION["success"] . "</p>";
                unset($_SESSION["success"]); 
            };
        ?>
        <h1>Cineplex</h1>
        <h3>Sign Up</h3>
        <form name="signupform" action="signup.php" method="POST">
            <div class="input-group">
                <input type="text" id="un" name="user" placeholder="Enter Username" required>
            </div>
        
            <div class="input-group">
                <input type="password" id="pw" name="pass" placeholder="Enter Password" required>
                <span toggle="#pw" class="toggle-password"><img src="img/svg/eye.svg" alt=""></span>
            </div>

            <div class="input-group">
                <input type="password" id="pwc" name="pass_confirm" placeholder="Confirm Password" required>
                <span toggle="#pwc" class="toggle-password-confirm"><img src="img/svg/eye.svg" alt=""></span>
            </div>
        
            <input type="submit" id="btn" value="Sign Up" name="submit"/>
            
        </form>
    </div>    


    <!-- show pw icon js -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('.toggle-password');
            const passwordField = document.querySelector('#pw');

            togglePassword.addEventListener('click', function () {
                togglePasswordVisibility(passwordField, this);
            });

            const togglePasswordConfirm = document.querySelector('.toggle-password-confirm');
            const passwordConfirmField = document.querySelector('#pwc');

            togglePasswordConfirm.addEventListener('click', function () {
                togglePasswordVisibility(passwordConfirmField, this);
            });

            function togglePasswordVisibility(field, icon) {
                const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
                field.setAttribute('type', type);

                // Toggle between eye and eye-slash SVG icons
                if (type === 'password') {
                    icon.innerHTML =
                        `<img src="img/svg/eye.svg" alt="">`;
                } else {
                    icon.innerHTML =
                        `<img src="img/svg/eye-slash.svg" alt="">`;
                }
            }
        });
    </script>

</body>

</html>