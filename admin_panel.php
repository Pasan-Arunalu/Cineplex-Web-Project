<?php
include("connection.php");

$msg = "";

if(isset($_POST['btnadd'])){
    $location = "images/"; 
    $maxSize = 10000000;
    $checked = true;
    $fileExt = array('jpg','jpeg','png');
    
    $name = basename($_FILES['movieUpload']['name']);
    $temp_name = $_FILES['movieUpload']['tmp_name'];
    $type = $_FILES['movieUpload']['type'];
    $size = $_FILES['movieUpload']['size'];    
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if(file_exists($location . $name)){
        $msg = "File already exists";
        $checked = false;
    }
    if($size > $maxSize){
        $msg = "File is too large";
        $checked = false;
    }
    if(!in_array($ext, $fileExt)){
        $msg = "Invalid file type";
        $checked = false;
    }

    if($checked){
        $id = isset($_POST['id']) ? $_POST['id'] : null;

        if ($id !== null) {
            $title = $_POST['txtmovie'];
            $description = $_POST['txtdes'];
            $video_url = $_POST['txturl'];
            $path = $location . $name;

            $sql = "INSERT INTO movies (id, title, description, image_path, video_url) VALUES ('$id', '$title', '$description', '$path', '$video_url')";
            
            if(mysqli_query($conn, $sql)){
                move_uploaded_file($temp_name, $location . $name);
                $msg = "Movie Record Inserted";
            } else {
                $msg = mysqli_error($conn);
            }
        } else {
            $msg = "Movie ID is not set.";
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
