<?php


$sql1 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 1";
$sql2 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 2";
$sql3 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 3";
$sql4 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 4";
$sql5 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 5";
$sql6 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 6";
$sql7 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 7";
$sql8 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 8";
$sql9 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 9";
$sql10 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 10";
$sql11 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 11";
$sql12 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 12";
$sql13 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 13";
$sql14 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 14";
$sql15 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 15";
$sql16 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 16";
$sql17 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 17";
$sql18 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 18";
$sql19 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 19";
$sql20 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 20";
$sql21 = "SELECT movie_id, title, description, image_path, showtime_id FROM movies WHERE movie_id = 21";


$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);
$result6 = $conn->query($sql6);
$result7 = $conn->query($sql7);
$result8 = $conn->query($sql8);
$result9 = $conn->query($sql9);
$result10 = $conn->query($sql10);
$result11 = $conn->query($sql11);
$result12 = $conn->query($sql12);
$result13 = $conn->query($sql13);
$result14 = $conn->query($sql14);
$result15 = $conn->query($sql15);
$result16 = $conn->query($sql16);
$result17 = $conn->query($sql17);
$result18 = $conn->query($sql18);
$result19 = $conn->query($sql19);
$result20 = $conn->query($sql20);
$result21 = $conn->query($sql21);



$title1 = "";
$disc1 = "";
$img1 = "";
$showtime1 = "";
$movieID1 = "";

$title2 = "";
$disc2 = "";
$img2 = "";
$showtime2 = "";
$movieID2 = "";

$title3 = "";
$disc3 = "";
$img3 = "";
$showtime3 = "";
$movieID3 = "";

$title4 = "";
$disc4 = "";
$img4 = "";
$showtime4 = "";
$movieID4 = "";

$title5 = "";
$disc5 = "";
$img5 = "";
$showtime5 = "";
$movieID5 = "";

$title6 = "";
$disc6 = "";
$img6 = "";
$showtime6 = "";
$movieID6 = "";

$title7 = "";
$disc7 = "";
$img7 = "";
$showtime7 = "";
$movieID7 = "";

$title8 = "";
$disc8 = "";
$img8 = "";
$showtime8 = "";
$movieID8 = "";

$title9 = "";
$disc9 = "";
$img9 = "";
$showtime9 = "";
$movieID9 = "";

$title10 = "";
$disc10 = "";
$img10 = "";
$showtime10 = "";
$movieID10 = "";

$title11 = "";
$disc11 = "";
$img11 = "";
$showtime11 = "";
$movieID11 = "";

$title12 = "";
$disc12 = "";
$img12 = "";
$showtime12 = "";
$movieID12 = "";

$title13 = "";
$disc13 = "";
$img13 = "";
$showtime13 = "";
$movieID13 = "";

$title14 = "";
$disc14 = "";
$img14 = "";
$showtime14 = "";
$movieID14 = "";

$title15 = "";
$disc15 = "";
$img15 = "";
$showtime15 = "";
$movieID15 = "";

$title16 = "";
$disc16 = "";
$img16 = "";
$showtime16 = "";
$movieID16 = "";

$title17 = "";
$disc17 = "";
$img17 = "";
$showtime17 = "";
$movieID17 = "";

$title18 = "";
$disc18 = "";
$img18 = "";
$showtime18 = "";
$movieID18 = "";

$title19 = "";
$disc19 = "";
$img19 = "";
$showtime19 = "";
$movieID19 = "";

$title20 = "";
$disc20 = "";
$img20 = "";
$showtime20 = "";
$movieID20 = "";

$title21 = "";
$disc21 = "";
$img21 = "";
$showtime21 = "";
$movieID21 = "";


if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $title1 = $row["title"];
    $disc1 = $row["description"];
    $img1 = $row["image_path"];
    $showtime1 = $row["showtime_id"];
    $movieID1 = $row["movie_id"];
}

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $title2 = $row["title"];
    $disc2 = $row["description"];
    $img2 = $row["image_path"];
    $showtime2 = $row["showtime_id"];
    $movieID2 = $row["movie_id"];
}

if ($result3->num_rows > 0) {
    $row = $result3->fetch_assoc();
    $title3 = $row["title"];
    $disc3 = $row["description"];
    $img3 = $row["image_path"];
    $showtime3 = $row["showtime_id"];
    $movieID3 = $row["movie_id"];
}

if ($result4->num_rows > 0) {
    $row = $result4->fetch_assoc();
    $title4 = $row["title"];
    $disc4 = $row["description"];
    $img4 = $row["image_path"];
    $showtime4 = $row["showtime_id"];
    $movieID4 = $row["movie_id"]; 
}

if ($result5->num_rows > 0) {
    $row = $result5->fetch_assoc();
    $title5 = $row["title"];
    $disc5 = $row["description"];
    $img5 = $row["image_path"];
    $showtime5 = $row["showtime_id"];
    $movieID5 = $row["movie_id"];
}

if ($result6->num_rows > 0) {
    $row = $result6->fetch_assoc();
    $title6 = $row["title"];
    $disc6 = $row["description"];
    $img6 = $row["image_path"];
    $showtime6 = $row["showtime_id"];
    $movieID6 = $row["movie_id"];
}

if ($result7->num_rows > 0) {
    $row = $result7->fetch_assoc();
    $title7 = $row["title"];
    $disc7 = $row["description"];
    $img7 = $row["image_path"];
    $showtime7 = $row["showtime_id"];
    $movieID7 = $row["movie_id"];
}

if ($result8->num_rows > 0) {
    $row = $result8->fetch_assoc();
    $title8 = $row["title"];
    $disc8 = $row["description"];
    $img8 = $row["image_path"];
    $showtime8 = $row["showtime_id"];
    $movieID8 = $row["movie_id"];
}

if ($result9->num_rows > 0) {
    $row = $result9->fetch_assoc();
    $title9 = $row["title"];
    $disc9 = $row["description"];
    $img9 = $row["image_path"];
    $showtime9 = $row["showtime_id"];
    $movieID9 = $row["movie_id"];
}

if ($result10->num_rows > 0) {
    $row = $result10->fetch_assoc();
    $title10 = $row["title"];
    $disc10 = $row["description"];
    $img10 = $row["image_path"];
    $showtime10 = $row["showtime_id"];
    $movieID10 = $row["movie_id"];
}

if ($result11->num_rows > 0) {
    $row = $result11->fetch_assoc();
    $title11 = $row["title"];
    $disc11 = $row["description"];
    $img11 = $row["image_path"];
    $showtime11 = $row["showtime_id"];
    $movieID11 = $row["movie_id"];
}

if ($result12->num_rows > 0) {
    $row = $result12->fetch_assoc();
    $title12 = $row["title"];
    $disc12 = $row["description"];
    $img12 = $row["image_path"];
    $showtime12 = $row["showtime_id"];
    $movieID12 = $row["movie_id"];
}

if ($result13->num_rows > 0) {
    $row = $result13->fetch_assoc();
    $title13 = $row["title"];
    $disc13 = $row["description"];
    $img13 = $row["image_path"];
    $showtime13 = $row["showtime_id"];
    $movieID13 = $row["movie_id"];
}

if ($result14->num_rows > 0) {
    $row = $result14->fetch_assoc();
    $title14 = $row["title"];
    $disc14 = $row["description"];
    $img14 = $row["image_path"];
    $showtime14 = $row["showtime_id"];
    $movieID14 = $row["movie_id"];
}

if ($result15->num_rows > 0) {
    $row = $result15->fetch_assoc();
    $title15 = $row["title"];
    $disc15 = $row["description"];
    $img15 = $row["image_path"];
    $showtime15 = $row["showtime_id"];
    $movieID15 = $row["movie_id"];
}

if ($result16->num_rows > 0) {
    $row = $result16->fetch_assoc();
    $title16 = $row["title"];
    $disc16 = $row["description"];
    $img16 = $row["image_path"];
    $showtime16 = $row["showtime_id"];
    $movieID16 = $row["movie_id"];
}

if ($result17->num_rows > 0) {
    $row = $result17->fetch_assoc();
    $title17 = $row["title"];
    $disc17 = $row["description"];
    $img17 = $row["image_path"];
    $showtime17 = $row["showtime_id"];
    $movieID17 = $row["movie_id"];
}

if ($result18->num_rows > 0) {
    $row = $result18->fetch_assoc();
    $title18 = $row["title"];
    $disc18 = $row["description"];
    $img18 = $row["image_path"];
    $showtime18 = $row["showtime_id"];
    $movieID18 = $row["movie_id"];
}

if ($result19->num_rows > 0) {
    $row = $result19->fetch_assoc();
    $title19 = $row["title"];
    $disc19 = $row["description"];
    $img19 = $row["image_path"];
    $showtime19 = $row["showtime_id"];
    $movieID19 = $row["movie_id"];
}

if ($result20->num_rows > 0) {
    $row = $result20->fetch_assoc();
    $title20 = $row["title"];
    $disc20 = $row["description"];
    $img20 = $row["image_path"];
    $showtime20 = $row["showtime_id"];
    $movieID20 = $row["movie_id"];
}

if ($result21->num_rows > 0) {
    $row = $result21->fetch_assoc();
    $title21 = $row["title"];
    $disc21 = $row["description"];
    $img21 = $row["image_path"];
    $showtime21 = $row["showtime_id"];
    $movieID21 = $row["movie_id"];
}

