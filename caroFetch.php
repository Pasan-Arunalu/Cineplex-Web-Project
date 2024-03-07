<?php
$sql1 = "SELECT title, description, image_path FROM movies WHERE id = 1";
$sql2 = "SELECT title, description, image_path FROM movies WHERE id = 2";
$sql3 = "SELECT title, description, image_path FROM movies WHERE id = 3";
$sql4 = "SELECT title, description, image_path FROM movies WHERE id = 4";
$sql5 = "SELECT title, description, image_path FROM movies WHERE id = 5";
$sql6 = "SELECT title, description, image_path FROM movies WHERE id = 6";
$sql7 = "SELECT title, description, image_path FROM movies WHERE id = 7";
$sql8 = "SELECT title, description, image_path FROM movies WHERE id = 8";
$sql9 = "SELECT title, description, image_path FROM movies WHERE id = 9";
$sql10 = "SELECT title, description, image_path FROM movies WHERE id = 10";
$sql11 = "SELECT title, description, image_path FROM movies WHERE id = 11";
$sql12 = "SELECT title, description, image_path FROM movies WHERE id = 12";
$sql13 = "SELECT title, description, image_path FROM movies WHERE id = 13";
$sql14 = "SELECT title, description, image_path FROM movies WHERE id = 14";
$sql15 = "SELECT title, description, image_path FROM movies WHERE id = 15";
$sql16 = "SELECT title, description, image_path FROM movies WHERE id = 16";
$sql17 = "SELECT title, description, image_path FROM movies WHERE id = 17";
$sql18 = "SELECT title, description, image_path FROM movies WHERE id = 18";
$sql19 = "SELECT title, description, image_path FROM movies WHERE id = 19";
$sql20 = "SELECT title, description, image_path FROM movies WHERE id = 20";
$sql21 = "SELECT title, description, image_path FROM movies WHERE id = 21";


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

$title2 = "";
$disc2 = "";
$img2 = "";

$title3 = "";
$disc3 = "";
$img3 = "";

$title4 = "";
$disc4 = "";
$img4 = "";

$title5 = "";
$disc5 = "";
$img5 = "";

$title6 = "";
$disc6 = "";
$img6 = "";

$title7 = "";
$disc7 = "";
$img7 = "";

$title8 = "";
$disc8 = "";
$img8 = "";

$title9 = "";
$disc9 = "";
$img9 = "";

$title10 = "";
$disc10 = "";
$img10 = "";

$title11 = "";
$disc11 = "";
$img11 = "";

$title12 = "";
$disc12 = "";
$img12 = "";

$title13 = "";
$disc13 = "";
$img13 = "";

$title14 = "";
$disc14 = "";
$img14 = "";

$title15 = "";
$disc15 = "";
$img15 = "";

$title16 = "";
$disc16 = "";
$img16 = "";

$title17 = "";
$disc17 = "";
$img17 = "";

$title18 = "";
$disc18 = "";
$img18 = "";

$title19 = "";
$disc19 = "";
$img19 = "";

$title20 = "";
$disc20 = "";
$img20 = "";

$title21 = "";
$disc21 = "";
$img21 = "";


if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $title1 = $row["title"];
    $disc1 = $row["description"];
    $img1 = $row["image_path"];
}

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $title2 = $row["title"];
    $disc2 = $row["description"];
    $img2 = $row["image_path"];
}

if ($result3->num_rows > 0) {
    $row = $result3->fetch_assoc();
    $title3 = $row["title"];
    $disc3 = $row["description"];
    $img3 = $row["image_path"];
}

if ($result4->num_rows > 0) {
    $row = $result4->fetch_assoc();
    $title4 = $row["title"];
    $disc4 = $row["description"];
    $img4 = $row["image_path"];
}

if ($result5->num_rows > 0) {
    $row = $result5->fetch_assoc();
    $title5 = $row["title"];
    $disc5 = $row["description"];
    $img5 = $row["image_path"];
}

if ($result6->num_rows > 0) {
    $row = $result6->fetch_assoc();
    $title6 = $row["title"];
    $disc6 = $row["description"];
    $img6 = $row["image_path"];
}

if ($result7->num_rows > 0) {
    $row = $result7->fetch_assoc();
    $title7 = $row["title"];
    $disc7 = $row["description"];
    $img7 = $row["image_path"];
}

if ($result8->num_rows > 0) {
    $row = $result8->fetch_assoc();
    $title8 = $row["title"];
    $disc8 = $row["description"];
    $img8 = $row["image_path"];
}

if ($result9->num_rows > 0) {
    $row = $result9->fetch_assoc();
    $title9 = $row["title"];
    $disc9 = $row["description"];
    $img9 = $row["image_path"];
}

if ($result10->num_rows > 0) {
    $row = $result10->fetch_assoc();
    $title10 = $row["title"];
    $disc10 = $row["description"];
    $img10 = $row["image_path"];
}

if ($result11->num_rows > 0) {
    $row = $result11->fetch_assoc();
    $title11 = $row["title"];
    $disc11 = $row["description"];
    $img11 = $row["image_path"];
}

if ($result12->num_rows > 0) {
    $row = $result12->fetch_assoc();
    $title12 = $row["title"];
    $disc12 = $row["description"];
    $img12 = $row["image_path"];
}

if ($result13->num_rows > 0) {
    $row = $result13->fetch_assoc();
    $title13 = $row["title"];
    $disc13 = $row["description"];
    $img13 = $row["image_path"];
}

if ($result14->num_rows > 0) {
    $row = $result14->fetch_assoc();
    $title14 = $row["title"];
    $disc14 = $row["description"];
    $img14 = $row["image_path"];
}

if ($result15->num_rows > 0) {
    $row = $result15->fetch_assoc();
    $title15 = $row["title"];
    $disc15 = $row["description"];
    $img15 = $row["image_path"];
}

if ($result16->num_rows > 0) {
    $row = $result16->fetch_assoc();
    $title16 = $row["title"];
    $disc16 = $row["description"];
    $img16 = $row["image_path"];
}

if ($result17->num_rows > 0) {
    $row = $result17->fetch_assoc();
    $title17 = $row["title"];
    $disc17 = $row["description"];
    $img17 = $row["image_path"];
}

if ($result18->num_rows > 0) {
    $row = $result18->fetch_assoc();
    $title18 = $row["title"];
    $disc18 = $row["description"];
    $img18 = $row["image_path"];
}

if ($result19->num_rows > 0) {
    $row = $result19->fetch_assoc();
    $title19 = $row["title"];
    $disc19 = $row["description"];
    $img19 = $row["image_path"];
}

if ($result20->num_rows > 0) {
    $row = $result20->fetch_assoc();
    $title20 = $row["title"];
    $disc20 = $row["description"];
    $img20 = $row["image_path"];
}

if ($result21->num_rows > 0) {
    $row = $result21->fetch_assoc();
    $title21 = $row["title"];
    $disc21 = $row["description"];
    $img21 = $row["image_path"];
}