<style>
    <?php
    include './Components/styles/Navbar.css'
    ?>
</style>


<?php
echo '<nav class="navbar">
<div class="nav-left-elements">
    <img class="logo" src="./icons/logo-no-background.png" alt="Coder\'s Mate Logo">
    <ul class="navbar-elements">
        <li class="nav-link"><a class="nav-link-elem" href="./home.php">Home</a></li>
        <li class="nav-link"><a class="nav-link-elem" href="#">About</a></li>
        <li class="nav-link"><a class="nav-link-elem" href="./topics.php">Topics</a></li>
        <!-- Drop down element of the navbar  -->
        <div class="dropdown nav-link">
            <button class="dropbtn" onclick="dropDown()">Top Categories
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="myDropdown">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div>
    </ul>
</div>
<!-- Rigth Elements of the navbar -->
<div class="navbar-right-elements">
    <!-- Search Bar -->
    <div class="search">
        <input type="text" name="search" id="search-bar" placeholder="Search questions...">
        <button class="search_btn">
            <img class="search-icon" src="./icons/magnifying-glass-solid.svg" alt="search icon">
        </button>
    </div>
    <div>
    <button class="login-btn nav-btn">Login</button>
    <button class="signup-btn nav-btn">Sign Up</button>
    </div>
</div>


</nav>'
?>