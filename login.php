<?php
// Start or resume a session
session_start();

// Include the database connection file
include("connection.php");

// Function to sanitize input data
function sanitizeData($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = sanitizeData($_POST["user"]);
    $password = sanitizeData($_POST["pass"]);

    // SQL query using prepared statement to check if the user exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Successful login
        // Fetch the user data from the database
        $user_data = $result->fetch_assoc();
        $user_id = $user_data['user_id'];
        $user_role = $user_data['role']; 

        // Set session variables
        $_SESSION["user_id"] = $user_id;
        $_SESSION["username"] = $username;

        // Redirect based on user role
        if ($user_role == 'admin') {
            header("Location: admin_panel.php");
            exit();
        } elseif ($user_role == 'staff') {
            header("Location: admin_panel.php"); 
            exit();
        } else {
            
            header("Location: index.php");
            exit();
        }
    } else {
        // Invalid login
        $_SESSION["error"] = "Invalid username or password";
        header("Location: login.php");
        exit();
    }

}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/loginStyle.css">

    <title>Login</title>
</head>

<body>

    <?php
        include ("navbar.php");
    ?>

    <div class="loginform">
        <?php
            // Display error message if set in the session
            if (isset($_SESSION["error"])) {
                echo "<p style='color: red;'>" . $_SESSION["error"] . "</p>";
                unset($_SESSION["error"]); // Clear the error message
            }
        ?>
        <h1>Cineplex</h1>
        <h3>Login</h3>
        <form name="loginForm" action="login.php" method="POST">
            <div class="input-group">
                <input type="text" id="un" name="user" placeholder="Enter Username" required>
            </div>
        
            <div class="input-group">
                <input type="password" id="pw" name="pass" placeholder="Enter Password" required>
                <span toggle="#pw" class="toggle-password"><img src="img/svg/eye.svg" alt=""></span>
            </div>
        
            <input type="submit" id="btn" value="Login" name="submit"/>
            <a href="signup.php" class="signuplink">New User? Sign-Up here</a>
        </form>
    </div>    


    <!-- show pw icon js --> 
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('.toggle-password');
        const passwordField = document.querySelector('#pw');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle between eye and eye-slash SVG icons
            if (type === 'password') {
                this.innerHTML = 
                `<img src="img/svg/eye.svg" alt="">`;
            } else {
                this.innerHTML = 
                `<img src="img/svg/eye-slash.svg" alt="">`;
            }
        });
        });
    </script>

</body>

</html>