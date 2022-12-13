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

                    $sql1 = "SELECT * FROM `queries` WHERE query_cat_name = '$title'";
                    $result1 = mysqli_query($conn, $sql1);
                    $numQuery = mysqli_num_rows($result1);

                    if ($type == 'programming') {
                        echo '<div class="card">
                        <img src="./img/' . $title . '.jpg" alt="' . $title . ' image" class="card-img">
                        <div class="card_container">
                        <h1 class="card_heading">' . $title . '</h1>
                        <p class="card_para">' . substr($desc, 0, 200) . '...</p>
                        <div class="card-details">
                            <a href="./query.php?catName=' . $title . '"><button class="card_btn">View Queries</button></a>
                            <div class="stats">
                                <div class="stats-details">
                                    <p class="number">' . $numQuery . '</p>
                                    <p class="stats-title">Queries</p>
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

                    $sql1 = "SELECT * FROM `queries` WHERE query_cat_name = '$title'";
                    $result1 = mysqli_query($conn, $sql1);
                    $numQuery = mysqli_num_rows($result1);

                    if ($type == 'framework') {
                        echo '<div class="card">
                    <img src="./img/' . $title . '.jpg" alt="' . $title . ' image" class="card-img">
                    <div class="card_container">
                        <h1 class="card_heading">' . $title . '</h1>
                        <p class="card_para">' . substr($desc, 0, 200) . '...</p>
                        <div class="card-details">
                        <a href="./query.php?catName=' . $title . '"><button class="card_btn">View Queries</button></a>
                            <div class="stats">
                                <div class="stats-details">
                                    <p class="number">' . $numQuery . '</p>
                                    <p class="stats-title">Queries</p>
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

        <!-- Recent Query Section  -->

        <div class="recent">
            <h1 class="recentHeading">Recent Queries</h1>
            <div class="recentList">
                <?php
                $sql1 = "SELECT * FROM `queries` ORDER BY query_time DESC LIMIT 6";
                $result1 = mysqli_query($conn, $sql1);
                while ($row = mysqli_fetch_assoc($result1)) {
                    $query_id = $row['query_id'];
                    $recentTitle = $row['query_title'];
                    $recentDesc = $row['query_desc'];
                    $query_user_id = $row['query_user_id'];
                    $catName = $row['query_cat_name'];

                    $sql2 = "SELECT * FROM `users` WHERE user_id = '$query_user_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row1 = mysqli_fetch_assoc($result2);
                    $userName = $row1['user_name'];
                    echo '<div class="recentCard">
                                
                                <div class="recentDetails">
                                    <a id="recentLink" href="./replies.php?catName=' . $catName . '&queryId=' . $query_id . '"><div class="recentTitle">' . $recentTitle . '</div></a>
                                    <div class="recentDesc">
                                        ' . substr($recentDesc, 0, 50) . '...
                                    </div>
                                    <div class="userDetails">
                                        <img src="icons\userdefault.svg" id="userImage">
                                        <p class="userName">' . $userName . '</p>
                                    </div>
                                </div>
                            </div>
                        ';
                }
                ?>
            </div>

            <!-- Recent Reply Section  -->
            <!-- <h1 class="recentHeading">Recent Reply</h1>
            <div class="recentList">
                <?php
                $sql2 = "SELECT * FROM `replies` ORDER BY reply_time DESC LIMIT 6";
                $result2 = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result2)) {
                    $recentTitle = $row['query_title'];
                    $recentDesc = $row['query_desc'];
                    echo '<div class="recentCard">
                                <img src="" alt="">
                                <div class="recentDetails">
                                    <a href=""><div class="recentTitle">' . $recentTitle . '</div></a>
                                    <div class="recentDesc">
                                        ' . substr($recentDesc, 0, 50) . '...
                                    </div>
                                    <div class="userDetails">
                                        <div class="userImage"></div>
                                        <p class="userName">him-kishan</p>
                                    </div>
                                </div>
                            </div>
                        ';
                }
                ?>
            </div> -->

        </div>




    </div>




    <?php

    include './Components/Footer.php';
    ?>

</body>

</html>