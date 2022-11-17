<?php

$userName = $_GET['username'];
$userid = $_GET['userid'];


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include './dbconnect.php';

    $replyDesc = $_POST['replyDesc'];
    $replyId = $_POST['replyId'];

    $sql = "UPDATE `replies` SET `reply_desc` = '$replyDesc' WHERE reply_id = '$replyId'";
    $result = mysqli_query($conn, $sql);

    header("Location: /CodersMate/myProfile.php?userid=$userid&username=$userName");

}