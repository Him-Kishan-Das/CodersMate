<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate - Topics</title>
    <link rel="stylesheet" href="./styles/topics.css">
</head>

<body>
    <?php
    include './Components/dbconnect.php';
    include './Components/Navbar.php';
    ?>

    <div class="main">
        <div class="section1">

            <h1>Programming Languages</h1>

            <!-- Programming Languages  -->
            <div class="program">
                <?php
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['category_id'];
                    $title = $row['category_name'];
                    $desc = $row['category_description'];
                    $type = $row['category_type'];
                    if ($type == 'programming') {
                        echo '<div class="card">
                        <img src="./img/'. $title .'.jpg" alt="'. $title .' image" class="card-img">
                        <div class="card_container">
                        <h1 class="card_heading">' . $title . '</h1>
                        <p class="card_para">' . substr($desc, 0, 200) .'...</p>
                        <div class="card-details">
                            <a href="./query.php?catName='. $title .'"><button class="card_btn">View Queries</button></a>
                            <div class="stats">
                                <div class="stats-details">
                                    <p class="number">10</p>
                                    <p class="stats-title">Questions</p>
                                </div>
                                <div class="stats-details">
                                    <p class="number">10</p>
                                    <p class="stats-title">Replies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                    }
                }
                ?>

            </div>

            <!-- Frameworks  -->
            <h1>FrameWorks</h1>
            <div class="program">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['category_id'];
                    $title = $row['category_name'];
                    $desc = $row['category_description'];
                    $type = $row['category_type'];
                    if ($type == 'framework') {
                    echo '<div class="card">
                    <img src="./img/'. $title .'.jpg" alt="'. $title .' image" class="card-img">
                    <div class="card_container">
                        <h1 class="card_heading">'. $title .'</h1>
                        <p class="card_para">' . substr($desc, 0, 200) .'...</p>
                        <div class="card-details">
                        <a href="./query.php?catName='. $title .'"><button class="card_btn">View Queries</button></a>
                            <div class="stats">
                                <div class="stats-details">
                                    <p class="number">10</p>
                                    <p class="stats-title">Questions</p>
                                </div>
                                <div class="stats-details">
                                    <p class="number">10</p>
                                    <p class="stats-title">Replies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                    }
                }
                ?>

            </div>
        </div>
    </div>


    <?php

    include './Components/Footer.php';
    ?>

</body>

</html>