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
        <li class="nav-link"><a class="nav-link-elem" href="./topics.php">Categories</a></li>
        <!-- Drop down element of the navbar  -->
        <div class="dropdown nav-link">
          <button class="dropbtn" onclick="dropDown()">Top Categories
            <i class="fa fa-caret-down"></i>
             </button>
             <div class="dropdown-content" id="myDropdown">';


$sql = "SELECT category_name FROM `categories`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo '          <a href="./query.php?catName=' . $row['category_name'] . '">' . $row['category_name'] . '</a>';
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
                    <input type="text" name="search" id="search-bar" placeholder="Search queries...">
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
    $role = $row['user_role'];
    echo '
          <div class="dropdown nav-link">
                    <button class="dropbtn" onclick="dropDown()"><img class="nav_profile" src="./icons/user-solid.svg">
                         <i class="fa fa-caret-down"></i>
                    </button>
            <div class="dropdown-content profile-content" id="myDropdown">
            <div class="hl"></div>
                <p class="profile_name">' . $userName . '</p>
                <hr>
                <a class="drop_down_link" href="./myProfile.php?userid=' . $user_id . '&username=' . $userName . '">
                    <img class="drop_down_img" src="./icons/user-solid.svg">
                    My Profile
                </a>';

        if (isset($_POST['saveNote'])) {
            $noteDesc = $_POST['note'];

            $sql = "INSERT INTO `notes` (`note_desc`, `note_user_id`, `note_time`) VALUES ('$noteDesc', '$user_id', current_timestamp())";
            $result = mysqli_query($conn, $sql);
        }

    echo '<a style="cursor: pointer" class="drop_down_link" id="myBtn"><img class="drop_down_img" src="./icons/note-sticky-solid.svg">
                   Note</a>
                    <div id="myModal" class="modal" class="drop_down_link">      
                        <div class="modal-content noteModal">
                            <span class="close">&times;</span>
                            
                            <form action="" method="post" class="noteForm">
                                <label for="note" class="modalText noteText">Note</label>
                                <textarea name="note" cols="30" rows="19" class="noteInput"></textarea>

                                <button class="saveBtn" name="saveNote">Save</button>
                            </form>
                            
                        </div>
                    </div>                
                ';

    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
        echo '<a class="drop_down_link" href="./admin.php?userid=' . $user_id . '&username=' . $userName . '">
                        <img class="drop_down_img" src="icons\screwdriver-wrench-solid.svg">
                        Admin
                    </a>';
    }

    echo '<a class="drop_down_link" href="./Components/loggingout.php">
                    <img class="drop_down_img" src="./icons/arrow-right-from-bracket-solid.svg">
                    Log Out
                </a>
            </div>
        </div>';
} else {
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