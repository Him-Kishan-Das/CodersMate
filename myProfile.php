<?php
$userName = $_GET['username'];
$userid = $_GET['userid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coders Mate | <?php echo $userName ?></title>
    <link rel="stylesheet" href="./styles/myProfile.css">
</head>

<body>

    <?php
    include './Components/dbconnect.php';
    include './Components/Navbar.php';
    ?>

    <div class="main">

        <!-- Profile Section  -->
        <div class="profileUsernameSection">
            <img src="./icons/user-solid.svg" alt="profilePic" class="profilePic">
            <div class="userMailName">
                <p class="username"><?php echo $userName ?></p>
                <p class="userMail">himkishandas456@gmail.com</p>
            </div>
        </div>

        <div class="section2">
            <form action="" class="profileForm" method="post">
                <div class="row">
                    <div class="input">
                        <label for="realName" class="profileText">Name</label>
                        <input name="realName" type="text" class="profileInput" id="profileInputName" placeholder="Enter your full name">
                    </div>

                    <div class="input">
                        <label for="gender" class="profileText">Gender</label>
                        <select id="gender" name="gender" class="profileInput ">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input">
                        <label for="state" class="profileText">State</label>
                        <input name="state" type="text" class="profileInput" id="profileInputState" placeholder="Enter your state">
                    </div>

                    <div class="input">
                        <label for="city" class="profileText">City</label>
                        <input name="city" type="text" class="profileInput" id="profileInputCity" placeholder="Enter your city">
                    </div>
                </div>

                <div class="row">
                    <div class="input">
                        <label for="country" class="profileText">Country</label>
                        <input name="country" type="text" class="profileInput" id="profileInputCountry" placeholder="Enter your country">
                    </div>
                </div>

                <button class="profileSubmitBtn">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>