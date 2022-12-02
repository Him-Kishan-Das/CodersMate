<?php

use function PHPSTORM_META\map;

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

    <div class="container">

        <?php

        // profile update 
        if (isset($_POST['profileUpdate'])) {
            $realName = $_POST['realName'];
            $gender = $_POST['gender'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $country = $_POST['country'];

            $sql = "UPDATE `users` SET `name` = '$realName', `gender` = '$gender', `state` = '$state', `city` = '$city', `country` = '$country' WHERE user_id = '$userid'";
            $result = mysqli_query($conn, $sql);
            $alert = true;
            if ($alert) {
                echo '<div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Profile Updated Successfully!</strong>
                      </div>';
            }
        }

        // query update 

        if (isset($_POST['queryUpdate'])) {
            $queryTitle = $_POST['queryTitle'];
            $queryDesc = $_POST['queryDesc'];
            $queryId = $_POST['queryId'];

            $sql = "UPDATE `queries` SET `query_title` = '$queryTitle', `query_desc` = '$queryDesc' WHERE query_id = '$queryId'";
            $result = mysqli_query($conn, $sql);

            $alert = true;
            if($alert){
                echo '<div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Query Updated Successfully!</strong>
                     </div>';
            }
        }

        // reply update 

        if (isset($_POST['replyUpdate'])) {


            $replyDesc = $_POST['replyDesc'];
            $replyId = $_POST['replyId'];

            $sql = "UPDATE `replies` SET `reply_desc` = '$replyDesc' WHERE reply_id = '$replyId'";
            $result = mysqli_query($conn, $sql);
            $alert = true;
            if ($alert) {
                echo '<div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Reply Updated Successfully!</strong>
                        </div>';
            }
        }

        // Update saved Notes 
        if (isset($_POST['noteUpdate'])) {
            $noteDesc = $_POST['noteDesc'];
            $noteId = $_POST['noteId'];
            $noteUpdate = "UPDATE `notes` SET `note_desc` = '$noteDesc' WHERE `note_id` = '$noteId'";
            $noteUpdateQuery = mysqli_query($conn, $noteUpdate);
            $alert = true;
            if($alert){
                echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                <strong>Note Updated Successfully!</strong>
                </div>';
            }
        }

        // Delete Feature 
        if (isset($_POST['noteDelete'])) {
            $noteDeleteId = $_POST['noteId'];
            $noteDelete = "DELETE FROM `notes` WHERE `note_id` = '$noteDeleteId'";
            $noteDeleteQuery = mysqli_query($conn, $noteDelete);
            $alert = true;
            if($alert){
                echo '<div class="alert" style="background: red">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                <strong>Note Deleted Successfully!</strong>
                </div>';
            }
        }


        ?>

    </div>



    <div class="main">

        <!-- Profile Section  -->
        <div class="profileUsernameSection">
            <img src="./icons/user-solid.svg" alt="profilePic" class="profilePic">
            <div class="userMailName">
                <p class="username"><?php echo $userName ?></p>
                <p class="userMail">himkishandas456@gmail.com</p>
            </div>
        </div>




        <!-- Form Section  -->
        <div class="section2">
            <?php

            $sql1 = "SELECT * FROM `users` WHERE user_id = '$userid'";
            $result1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($result1);
            $realName = $row['name'];
            $gender = $row['gender'];
            $state = $row['state'];
            $city = $row['city'];
            $country = $row['country'];


            ?>
            <form action="" class="profileForm" method="POST">
                <div class="row">
                    <div class="input">
                        <label for="realName" class="profileText">Name</label>
                        <input required name="realName" type="text" class="profileInput" id="profileInputName" placeholder="Enter your full name" value="<?php echo $realName ?>">
                    </div>

                    <div class="input">
                        <label for="gender" class="profileText">Gender</label>
                        <select id="gender" name="gender" class="profileInput">
                            <option value="Male" <?php if ($gender == "Male") echo 'selected="selected"'; ?>>Male</option>
                            <option value="Female" <?php if ($gender == "Female") echo 'selected="selected"'; ?>>Female</option>
                            <option value="Other" <?php if ($gender == "Other") echo 'selected="selected"'; ?>>Other</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input">
                        <label for="state" class="profileText">State</label>
                        <input required name="state" type="text" class="profileInput" id="profileInputState" placeholder="Enter your state" value="<?php echo $state ?>">
                    </div>

                    <div class="input">
                        <label for="city" class="profileText">City</label>
                        <input name="city" type="text" class="profileInput" id="profileInputCity" placeholder="Enter your city" value="<?php echo $city ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="input">
                        <label for="country" class="profileText">Country</label>
                        <input required name="country" type="text" class="profileInput" id="profileInputCountry" placeholder="Enter your country" value="<?php echo $country ?>">
                    </div>
                </div>

                <button class="profileSubmitBtn" id="updateBtn" name="profileUpdate">Update</button>

            </form>
        </div>

        <!-- Section3  -->
        <div class="section3">
            <!-- Buttons  -->
            <div class="buttons">
                <button id="queryBtn" class="showBtn" onclick="showQuery()">Query</button>
                <button id="repliesBtn" class="showBtn" onclick="showReply()">Replies</button>
                <button id="notesBtn" class="showBtn" onclick="showNote()">Note</button>
            </div>
            <hr>



            <!-- Query Section  -->

            <div id="userQueries">
                <?php
                $sql1 = "SELECT * FROM `queries` WHERE query_user_id = '$userid'";
                $result1 = mysqli_query($conn, $sql1);
                while ($row = mysqli_fetch_assoc($result1)) {
                    $queryTitle = $row['query_title'];
                    $queryDesc = $row['query_desc'];
                    $queryId = $row['query_id'];
                    echo '<form action="" method="post" class="queryForm">
                        <input type="hidden" class="queryid" name="queryId" value="' . $queryId . '">
                                <input type="text" id="queryTitle" name="queryTitle" value="' . $queryTitle . '">
                                <textarea name="queryDesc" id="queryDesc" cols="30" rows="3">' . $queryDesc . '</textarea>
                                <button id="editBtn" name="queryUpdate">Update</button>
                            </form>';
                }
                ?>
            </div>

            <!-- Replies Section  -->
            <div id="userReplies">
                <?php
                $sql2 = "SELECT * FROM `replies` WHERE reply_user_id = '$userid'";
                $result2 = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result2)) {
                    $replyDesc = $row['reply_desc'];
                    $queryId = $row['query_id'];
                    $replyId = $row['reply_id'];

                    $sql3 = "SELECT * FROM `queries` WHERE query_id = '$queryId'";
                    $result3 = mysqli_query($conn, $sql3);
                    $row1 = mysqli_fetch_assoc($result3);
                    echo '<form action="" method="post" class="replyForm">
                            <h3 ><a class="queryTitle" href="">' . $row1['query_title'] . '</a>
                            </h3>
                            <input type="hidden" class="replyid" name="replyId" value="' . $replyId . '">
                            <textarea name="replyDesc" id="replyDesc" cols="30" rows="3">' . $replyDesc . '</textarea>
                            <button id="editBtn" name="replyUpdate">Update</button>
                        </form>';
                }
                ?>
            </div>

            <!-- Note Section  -->
            <?php
            // Update Feature


            ?>


            <div id="userNotes">
                <?php
                $sql4 = "SELECT * FROM `notes` WHERE note_user_id='$userid'";
                $result4 = mysqli_query($conn, $sql4);

                while ($row2 = mysqli_fetch_assoc($result4)) {

                    echo '<form action="" method="post" class="noteSection">
                            <div class="noteBox">
                            <input hidden name="noteId" value="' . $row2['note_id'] . '">
                                <textarea class="noteArea" name="noteDesc" id="" cols="30" rows="8">' . $row2['note_desc'] . '</textarea>

                                <p class="time">' . $row2['note_time'] . '</p>
                            </div>
                            <div class="noteBox1">
                                <button id="noteUpdate" name="noteUpdate" class="noteBtn">Update</button>
                                <button id="noteDelete" name="noteDelete" class="noteBtn">Delete</button>
                            </div>
                        </form>';
                }
                ?>
            </div>


        </div>
    </div>

</body>
<script src="./scripts/myProfile.js"></script>

</html>