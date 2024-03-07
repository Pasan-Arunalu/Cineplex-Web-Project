<?php
include("connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnadd"])) {
    // Validate input
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;
    $title = isset($_POST["txtmovie"]) ? htmlspecialchars($_POST["txtmovie"]) : "";
    $description = isset($_POST["txtdes"]) ? htmlspecialchars($_POST["txtdes"]) : "";
    $video_url = isset($_POST["txturl"]) ? htmlspecialchars($_POST["txturl"]) : "";

    // Validate file upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["movieUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["btnadd"])) {
        $check = getimagesize($_FILES["movieUpload"]["tmp_name"]);
        if($check === false) {
            $message = "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["movieUpload"]["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["movieUpload"]["tmp_name"], $target_file)) {
            $message = "The file ". htmlspecialchars( basename( $_FILES["movieUpload"]["name"])). " has been uploaded.";
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }

    // Insert data into the database if upload is successful
    if ($uploadOk == 1) {
        $sql = "INSERT INTO movies (id, title, description, image_path, video_url) VALUES ('$id', '$title', '$description', '$target_file', '$video_url')";

        if ($conn->query($sql) === TRUE) {
            $message = "Record added successfully";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
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

    <title>Document</title>

</head>

<body>

<div class="container">

    <div class="message-container">
        <?php
        if (!empty($message)) {
            if (strpos($message, "successfully") !== false) {
                echo '<div class="success-message">' . $message . '</div>';
            } else {
                echo '<div class="error-message">' . $message . '</div>';
            }
        }
        ?>
    </div>

    <div class="formcontainer">
        <form method="POST" enctype="multipart/form-data" class="caro" action="admin_panel.php">
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
                    <td><input type="text" name="txtmovie"></td>
                </tr>
                <tr>
                    <td><label>Movie Description</label></td>
                    <td><input type="text" name="txtdes"></td>
                </tr>
                <tr>
                    <td><label>Video URL</label></td>
                    <td><input type="text" name="txturl"></td>
                </tr>
                <tr>
                    <td><label>Movie Poster</label></td>
                    <td><input type="file" name="movieUpload"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="btnadd" value="Add" id="addbtn"></td>
                </tr>
            </table>
        </form>
    </div>
</div>


</body>

</html>
