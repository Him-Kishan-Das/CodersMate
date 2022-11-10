<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate - SignUp</title>
    <link rel="stylesheet" href="./styles/signup.css">
</head>

<body>
    <div class="container">
        <div class="left">
            <img class="logo" src="./icons/logo-no-background.png" alt="coders mate logo">
            <img class="young-women-image" src="./img/young-woman-sitting-at-computer-desk.png" alt="" srcset="">
        </div>
        <div class="right">
            <h2 class="signupHeading">SignUp Form</h2>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include './Components/dbconnect.php';

                $userName = $_POST['signupUserName'];
                $email = $_POST['signupEmail'];
                $password = $_POST['signupPassword'];
                $confirmPassword = $_POST['signupConfirmPassword'];

                $alreadyExistUsername = "SELECT * FROM `users` WHERE user_name = '$userName'";
                $result = mysqli_query($conn, $alreadyExistUsername);
                $rowsForUsername = mysqli_num_rows($result);

                $alreadyExistEmail = "SELECT * FROM `users` WHERE user_email = '$email'";
                $result1 = mysqli_query($conn, $alreadyExistEmail);
                $rowsForEmail = mysqli_num_rows($result1);

                if ($rowsForUsername > 0) {
                    echo '<h2 class="error">*Username already exist</h2>';
                }
                if ($rowsForEmail > 0) {
                    echo '<h2 class="error">*Email already exist</h2>';
                }

                if ($password == $confirmPassword) {
                    $finalPassword = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`,`signup_time`) VALUES ('$userName', '$email', '$finalPassword',current_timestamp())";
                    $result2 = mysqli_query($conn, $sql);
                    if ($result2) {
                        echo '<h2 class="success">Sign up successfull!! <a href="./home.php"> Click Here</a> and Login</h2>';
                    }
                } else {
                    echo '<h2 class="error">*Email already exist</h2>';
                }
            }

            ?>
            
            <form class="signupForm" action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
                <label for="signupUserName" class="formText">Username</label>
                <input type="text" name="signupUserName" id="userName" class="formInput">

                <label for="signupEmail" class="formText">Email</label>
                <input type="email" name="signupEmail" id="userEmail" class="formInput">

                <label for="signupPassword" class="formText">Password</label>
                <input type="password" name="signupPassword" id="userPassword" class="formInput">

                <label for="signupConfirmPassword" class="formText">Confirm Password</label>
                <input type="password" name="signupConfirmPassword" id="userPassword" class="formInput">

                <button class="signupBtn">SignUp</button>

                <p class="signupSmallText">Already have an account?<a href="./home.php"> Login</a> </p>
            </form>
        </div>
    </div>
</body>

</html>