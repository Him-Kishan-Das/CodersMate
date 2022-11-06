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
            <form class="signupForm" action="" method="post">
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