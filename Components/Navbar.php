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
    </div>
</div>


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

