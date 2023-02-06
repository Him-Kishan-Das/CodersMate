<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate - Home</title>
    <link rel="stylesheet" href="./styles/home.css">
</head>

<body>

    <?php

    
    include './Components/dbconnect.php';
    include './Components/Navbar.php';

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if (isset($_SESSION['logIn']) && $_SESSION['logIn'] == true) {
            echo ' <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Your login is Successfull</strong>
                    </div>';
        }
    }
        else if(isset($_GET['login'])){
                if($_GET['login']=='fail'){
                    echo ' <div class="alert" style="background: red;">
                                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                                <strong>Wrong Login Credentials</strong>
                            </div>';
                }
            }
    ?>


    <!-- Section - 1 -->
    <div class="section">
        <div class="part1">
            <h1 class="welcome_heading">Welcome to Coder's Mate</h1>
            <p class="para1">This is a Coding Forum to seek help or to offer help to the coders for various queries relating to programming languages and frameworks.</p>

            <form action="./search.php" method="GET">
                <div class="section_Search">
                    <input type="text" name="search" class="section_SearchBar">
                    <button class="section_searchBtn">Search</button>
                </div>
            </form>

        </div>
        <img class="section_img" src="./img/oskar-yildiz-cOkpTiJMGzA-unsplash.jpg" alt="codingImage">
    </div>

    <?php
    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($conn, $sql);
    $topics = mysqli_num_rows($result);

    $sql1 = "SELECT * FROM `queries` ";
    $result1 = mysqli_query($conn, $sql1);
    $queries = mysqli_num_rows($result1);


    $sql2 = "SELECT * FROM `replies`";
    $result2 = mysqli_query($conn, $sql2);
    $replies = mysqli_num_rows($result2);

    $sql3 = "SELECT * FROM `users`";
    $result3 = mysqli_query($conn, $sql3);
    $users = mysqli_num_rows($result3);

    ?>

    <!-- Section - 2 -->
    <div class="section2">
        <div class="block" id="categories">
            <img src="./icons/code-solid.svg" alt="code_icon" class="block_icon">
            <p class="num"><?php echo $topics ?></p>
            <p class="name">Topics</p>
        </div>
        <div class="block" id="queries">
            <img src="./icons/clipboard-question-solid.svg" alt="clipboard_icon" class="block_icon">
            <p class="num"><?php echo $queries ?></p>
            <p class="name">Queries</p>
        </div>
        <div class="block" id="replies">
            <img src="./icons/reply-solid.svg" alt="reply_icon" class="block_icon">
            <p class="num"><?php echo $replies ?></p>
            <p class="name">Replies</p>
        </div>
        <div class="block" id="registered_Users">
            <img src="./icons/user-solid.svg" alt="user_icon" class="block_icon">
            <p class="num"><?php echo $users ?></p>
            <p class="name">Registered Users</p>
        </div>
    </div>


    <!-- Section - 3 -->
    <div class="section3">
        <img class="section3_img" src="./img/joshua-reddekopp-SyYmXSDnJ54-unsplash.jpg" alt="coding image">
        <div class="part2">
            <p class="para2">
                This forum contains various topics like programming languages and frameworks.
                <br>
            </p>
            <p class="subtext">Click on Explore to ask queries.</p>
            <a href="./topics.php">
                <button class="exploreBtn">Explore</button>
            </a>
        </div>
    </div>

    <?php
    include './Components/Footer.php'
    ?>
</body>

<script src="./scripts/home.js"></script>

</html>