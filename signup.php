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
        <h1>Cineplex</h1>
        <h3>Sign Up</h3>
        <form name="signupform" action="signup.php" onsubmit="return isvalid()" method="POST">
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