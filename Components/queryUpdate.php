<?php

$userName = $_GET['username'];
$userid = $_GET['userid'];


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include './dbconnect.php';

    $queryTitle = $_POST['queryTitle'];
    $queryDesc = $_POST['queryDesc'];
    $queryId = $_POST['queryId'];

    $sql = "UPDATE `queries` SET `query_title` = '$queryTitle', `query_desc` = '$queryDesc' WHERE query_id = '$queryId'";
    $result = mysqli_query($conn, $sql);

    header("Location: /CodersMate/myProfile.php?userid=$userid&username=$userName");

}
