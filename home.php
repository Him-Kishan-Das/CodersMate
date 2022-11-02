<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate</title>
    <link rel="stylesheet" href="./styles/home.css">
</head>

<body>

    <?php
    include './Components/Navbar.php'
    ?>


    <!-- Section - 1 -->
    <div class="section">
        <div class="part1">
            <h1 class="welcome_heading">Welcome to Coder's Mate</h1>
            <p class="para1">This is a Coding Forum to seek help or to offer help to the coders for various queries relating to programming languages and frameworks.</p>
            <div class="section_Search">
                <input type="text" class="section_SearchBar">
                <button class="section_searchBtn">Search</button>
            </div>
        </div>
        <div>
            <img class="section_img" src="./img/oskar-yildiz-cOkpTiJMGzA-unsplash.jpg" alt="codingImage">
        </div>
    </div>


    <!-- Section - 2 -->
    <div class="section2">
        <div class="block" id="categories">
            <img src="./icons/code-solid.svg" alt="code_icon" class="block_icon">
            <p class="num">10</p>
            <p class="name">Topics</p>
        </div>
        <div class="block" id="queries">
            <img src="./icons/clipboard-question-solid.svg" alt="clipboard_icon" class="block_icon">
            <p class="num">50</p>
            <p class="name">Queries</p>
        </div>
        <div class="block" id="replies">
            <img src="./icons/reply-solid.svg" alt="reply_icon" class="block_icon">
            <p class="num">100</p>
            <p class="name">Replies</p>
        </div>
        <div class="block" id="registered_Users">
            <img src="./icons/user-solid.svg" alt="user_icon" class="block_icon">
            <p class="num">13</p>
            <p class="name">Registered Users</p>
        </div>
    </div>
</body>

<script src="./scripts/home.js"></script>

</html>