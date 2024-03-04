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
        <h1>Cineplex</h1>
        <h3>Login</h3>
        <form name="loginForm" action="login.php" onsubmit="return isvalid()" method="POST">
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