<?php
session_start();
include("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnadd"])) {
    // Validate input
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : null;
    $title = isset($_POST["txtmovie"]) ? htmlspecialchars($_POST["txtmovie"]) : "";
    $description = isset($_POST["txtdes"]) ? htmlspecialchars($_POST["txtdes"]) : "";
    $video_url = isset($_POST["txturl"]) ? htmlspecialchars($_POST["txturl"]) : "";

    // Validate file upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["movieUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["btnadd"]) && !empty($_FILES["movieUpload"]["tmp_name"])) {
        $check = getimagesize($_FILES["movieUpload"]["tmp_name"]);
        if ($check === false) {
            $message = "File is not an image.";
            $uploadOk = 0;
        }
    } else {
        $message = "Please select a valid image file.";
        $uploadOk = 0;
    }


    // Check file size
    if ($_FILES["movieUpload"]["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["movieUpload"]["tmp_name"], $target_file)) {
            $message = "The file " . htmlspecialchars(basename($_FILES["movieUpload"]["name"])) . " has been uploaded.";
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }

    if ($uploadOk == 1) {
        // Check if the ID is provided for updating an existing record
        if (!empty($id)) {
            $sql = "UPDATE movies SET title='$title', description='$description', image_path='$target_file', video_url='$video_url' WHERE movie_id='$id'";
        } else {
            $sql = "INSERT INTO movies (title, description, image_path, video_url) VALUES ('$title', '$description', '$target_file', '$video_url')";
        }

        if ($conn->query($sql) === TRUE) {
            $message = "Record " . (!empty($id) ? "updated" : "added") . " successfully";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "File upload error or invalid file.";
    }
}

// Display all booking details in a table
$bookingTable = '';
$deleteBookingMessage = ''; // Initialize the variable
$bookingQuery = "SELECT * FROM bookings";
$bookingResult = $conn->query($bookingQuery);

if ($bookingResult->num_rows > 0) {
    $bookingTable .= '<table>
                        <tr>
                            <th>Booking ID</th>
                            <th>User ID</th>
                            <th>Movie ID</th>
                            <th>Booked Date</th>
                            <th>Action</th>
                        </tr>';
    while ($bookingRow = $bookingResult->fetch_assoc()) {
        $bookingTable .= '<tr>
                            <td>' . $bookingRow['booking_id'] . '</td>
                            <td>' . $bookingRow['user_id'] . '</td>
                            <td>' . $bookingRow['movie_id'] . '</td>
                            <td>' . $bookingRow['booking_date'] . '</td>
                            <td><a style="color:#03131A; background-color:snow; text-decoration:none;" href="?cancelBooking=' . $bookingRow['booking_id'] . '">Cancel</a></td>
                        </tr>';
    }
    $bookingTable .= '</table>';
}

// Cancel booking logic
if (isset($_GET['cancelBooking'])) {
    $cancelBookingId = intval($_GET['cancelBooking']);
    $cancelBookingQuery = "DELETE FROM bookings WHERE booking_id = $cancelBookingId";
    if ($conn->query($cancelBookingQuery) === TRUE) {
        // Set the message variable after canceling booking
        $deleteBookingMessage = "Booking canceled successfully";
    } else {
        $deleteBookingMessage = "Error canceling booking: " . $conn->error;
    }
}

// Check if the form is submitted for adding staff
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnaddstaff"])) {
    // Validate input
    // $staff_user_id = isset($_POST["staff_user_id"]) ? intval($_POST["staff_user_id"]) : null;
    $staff_username = isset($_POST["staff_username"]) ? htmlspecialchars($_POST["staff_username"]) : "";
    $staff_password = isset($_POST["staff_password"]) ? $_POST["staff_password"] : "";

    // Check if the user ID already exists
    $existingUserQuery = "SELECT * FROM users WHERE username = '$staff_username'";
    $existingUserResult = $conn->query($existingUserQuery);

    if ($existingUserResult->num_rows > 0) {
        $staffMessage = "Error: Username already exists. Please choose a different Username.";
    } else {
        // Insert staff member into the users table
        $staffInsertQuery = "INSERT INTO users (username, password, role) VALUES ('$staff_username', '$staff_password', 'staff')";

        if ($conn->query($staffInsertQuery) === TRUE) {
            $staffMessage = "Staff member added successfully";
        } else {
            $staffMessage = "Error adding staff member: " . $conn->error;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/adminPanelStyle.css">

    <title>Cineplex - Admin Panel</title>

    <script>
        function validateForm() {
            // var id = document.getElementById("id").value;
            var title = document.getElementById("txtmovie").value;
            var description = document.getElementById("txtdes").value;
            var videoUrl = document.getElementById("txturl").value;
            var movieUpload = document.getElementById("movieUpload").value;

            if (title === "" || description === "" || videoUrl === "" || movieUpload === "") {
                alert("Please enter all details.");
                return false;
            }

            return true;
        }
    </script>

</head>

<body>
    <?php
    include "navbar.php";
    ?>

    <div class="frmcontainer">

        <div class="message-container">
            <?php
            if (!empty($message)) {
                if (strpos($message, "successfully") !== false) {
                    echo '<div class="success-message">' . $message . '</div>';
                } else {
                    echo '<div class="error-message">' . $message . '</div>';
                }
                // Clear the session message after displaying
                unset($_SESSION['message']);
            }
            ?>
        </div>

        <div class="formcontainer">
            <form method="POST" enctype="multipart/form-data" class="caro" action="admin_panel.php"
                onsubmit="return validateForm()">
                <h2>Update Carousel</h2>
                <table>
                    <tr>
                        <td><label for="id" class="label">Select ID</label></td>
                        <td>
                            <select name="id" id="id" class="select">
                                <option value="" disabled selected>Movie ID</option>
                                <option value="1">1 #Trending</option>
                                <option value="2">2 #Trending</option>
                                <option value="3">3 #Trending</option>
                                <option value="4">4 #Trending</option>
                                <option value="5">5 #Trending</option>
                                <option value="6">6 #Trending</option>
                                <option value="7">1 #Now Showing</option>
                                <option value="8">2 #Now Showing</option>
                                <option value="9">3 #Now Showing</option>
                                <option value="10">4 #Now Showing</option>
                                <option value="11">5 #Now Showing</option>
                                <option value="12">6 #Now Showing</option>
                                <option value="13">7 #Now Showing</option>
                                <option value="14">8 #Now Showing</option>
                                <option value="15">9 #Now Showing</option>
                                <option value="16">1 #Upcoming</option>
                                <option value="17">2 #Upcoming</option>
                                <option value="18">3 #Upcoming</option>
                                <option value="19">4 #Upcoming</option>
                                <option value="20">5 #Upcoming</option>
                                <option value="21">6 #Upcoming</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Movie Title</label></td>
                        <td><input type="text" name="txtmovie" style="height:25px; font-size:15px"></td>
                    </tr>
                    <tr>
                        <td><label>Movie Description</label></td>
                        <td><input type="text" name="txtdes" style="height:25px; font-size:15px"></td>
                    </tr>
                    <tr>
                        <td><label>Video URL</label></td>
                        <td><input type="text" name="txturl" style="height:25px; font-size:15px"></td>
                    </tr>
                    <tr>
                        <td><label>Movie Poster</label></td>
                        <td><input type="file" name="movieUpload" style="height:25px; font-size:15px"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="btnadd" value="Add" id="addbtn"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <!-- Booking Details Table -->
    <div class="booking-container">
        <!-- Booking Details Message Box -->
        <div class="message-container">
            <?php
            if (!empty($deleteBookingMessage)) {
                echo '<div class="success-message">' . $deleteBookingMessage . '</div>';

                unset($_SESSION['message']);
            }
            ?>
        </div>
        <div class="bookingwrapper">
            <h2 id="bd">Booking Details</h2>
            <?php echo $bookingTable; ?>
        </div>
        <a style="color:#03131A; background-color:snow; text-decoration:none;" href="feedback.php" id="fbid">View Feedbacks</a>
    </div>

    <div class="formcontainer2">
        <!-- Staff Form Message Box -->
        <div class="staff-message-container">
            <?php
            if (!empty($staffMessage)) {
                if (strpos($staffMessage, "successfully") !== false) {
                    echo '<div class="success-message">' . $staffMessage . '</div>';
                } else {
                    echo '<div class="error-message">' . $staffMessage . '</div>';
                }

                // Clear the session message after displaying
                unset($_SESSION['message']);
            }
            ?>
        </div>
        <form method="POST" enctype="multipart/form-data" class="caro" action="admin_panel.php"
            onsubmit="return validateForm()">
            <h2>Add Staff Member</h2>
            <table>
                <!-- <tr>
                    <td><label for="staff_user_id" class="label">User ID</label></td>
                    <td><input type="text" name="staff_user_id" id="staff_user_id" style="height:25px; font-size:15px"></td>
                </tr> -->
                <tr>
                    <td><label for="staff_username">Username</label></td>
                    <td><input type="text" name="staff_username" id="staff_username"
                            style="height:25px; font-size:15px"></td>
                </tr>
                <tr>
                    <td><label for="staff_password">Password</label></td>
                    <td><input type="password" name="staff_password" id="staff_password"
                            style="height:25px; font-size:15px"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="btnaddstaff" value="Add Staff" id="addstaffbtn"></td>
                </tr>
            </table>
        </form>
    </div>
    </div>

    <script>
        // Use JavaScript to clear the session message after a certain period (e.g., 5 seconds)
        setTimeout(function () {
            <?php echo 'document.querySelector(".message-container").innerHTML = "";'; ?>
        }, 5000);
    </script>
    <script>
        // Use JavaScript to clear the session message after a certain period (e.g., 5 seconds)
        setTimeout(function () {
            <?php echo 'document.querySelector(".staff-message-container").innerHTML = "";'; ?>
        }, 5000);
    </script>

</body>

</html>