<?php
    session_start();
?>
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
             <div class="dropdown-content" id="myDropdown">';


        $sql = "SELECT category_name FROM `categories`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
                echo '          <a href="./query.php?catName=' . $row['category_name'] . '">'. $row['category_name'] .'</a>';
                            
        }

    echo '</div>
            </div>
            </ul>
        </div>
        <!-- Rigth Elements of the navbar -->
        <div class="navbar-right-elements">
            <!-- Search Bar -->
            <form action="./search.php" method="GET">
                <div class="search">  
                    <input type="text" name="search" id="search-bar" placeholder="Search questions...">
                    <button class="search_btn">
                        <img class="search-icon" src="./icons/magnifying-glass-solid.svg" alt="search icon">
                    </button>
                    
                </div> 
            </form>';
           

if (isset($_SESSION['logIn']) && $_SESSION['logIn'] == true) {
    $email = $_SESSION['userEmail'];
    $sql1 = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $userName = $row['user_name'];
    $user_id = $row['user_id'];
    echo '<div class="dropdown nav-link">
            <button class="dropbtn" onclick="dropDown()"><img class="nav_profile" src="./icons/user-solid.svg">
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content profile-content" id="myDropdown">
            <div class="hl"></div>
                <p class="profile_name">'. $userName .'</p>
                <hr>
                <a class="drop_down_link" href="./myProfile.php?userid='. $user_id .'&username='. $userName .'">
                    <img class="drop_down_img" src="./icons/user-solid.svg">
                    My Profile
                </a>
                <a class="drop_down_link" href="./Components/loggingout.php">
                    <img class="drop_down_img" src="./icons/arrow-right-from-bracket-solid.svg">
                    Log Out
                </a>
            </div>
        </div>';

}



else {
    echo '<div>
            <button class="nav-btn" id="myBtn">Login</button>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>

                    <form action="./Components/loggingIn.php" method="post" class="loginForm">
                        <h2 class="modalHeading">Login</h2>
                        <label for="loginEmail" class="modalText">Email</label>
                        <input type="email" name="loginEmail" class="modalInput" id="loginEmail">
                        <label for="loginPassword" class="modalText">Password</label>
                        <input type="password" name="loginPassword" class="modalInput" id="loginPassword">
                        <button class="modalBtn">LOGIN</button>
                        <p class="modalSignUp">Dont\'t have an account?<a href="./signup.php"> SignUp Now</a> </p>
                    </form>
                </div>

            </div>
            <button class="signup-btn nav-btn"><a class="signup" href="./signup.php">Sign Up</a></button>
        </div>';
}

echo '</div>
    </nav>';

?>

<?php
echo '<script type="text/javascript">

var modal = document.getElementById("myModal");
console.log(modal);
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
     </script>';
?>