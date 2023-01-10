<?php
$adminUsername = $_GET['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate - Admin Panel</title>
    <link rel="stylesheet" href="./styles/admin.css">
</head>

<body>

    <?php
    include './Components/dbconnect.php';


    ?>
    <div class="adminnav">
        <?php
        include './Components/Navbar.php';
        ?>
    </div>


    <!-- Adding categories  -->
    <?php

    $adminQuery = "SELECT * FROM `users` WHERE user_name = '$adminUsername'";
    $adminResult = mysqli_query($conn, $adminQuery);
    $admin = mysqli_fetch_assoc($adminResult);
    $role = $admin['user_role'];

    if ($role == "admin") {

        if (isset($_POST['add'])) {
            $catName = $_POST['categoryName'];
            $catType = $_POST['categoryType'];
            $catDesc = $_POST['categoryDesc'];

            $select = "SELECT * FROM `categories` ORDER BY category_id DESC LIMIT 1";
            $catresult = mysqli_query($conn, $select);
            $row3 = mysqli_fetch_assoc($catresult);
            $catid = $row3['category_id'];
            $catid++;


            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            // if (isset($_POST["add"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "";
                $uploadOk = 1;
            } else {
                echo "<center>File is not an image.</center>";
                $uploadOk = 0;
            }
            // }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "<center>Sorry, file already exists.</center>";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "<center>Sorry, your file is too large.</center>";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "<center>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</center>";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<center>Sorry, your file was not uploaded.</center>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    // echo "<center><i><h4>The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.</h4></i></center>";
                    $insert = "INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_type`, `created`) VALUES ('$catid', '$catName','$catDesc',  '$catType',current_timestamp())";
                    $final = mysqli_query($conn, $insert);
                    $alert = true;
                    if ($alert == true) {
                        echo '<div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Category Added Successfully!</strong>
                    </div>';
                    }
                } else {
                    echo "<center>Sorry, there was an error uploading your file.</font></center>";
                }
            }
        }



        // updating categories 
        if (isset($_POST['updateCat'])) {
            $title = $_POST['catTitle'];
            $desc = $_POST['catDesc'];
            $id = $_POST['catid'];
            $update = "UPDATE `categories` SET `category_name` = '$title', `category_description` = '$desc' WHERE category_id = '$id'";
            $updateQuery = mysqli_query($conn, $update);
            $alert = true;
            if ($alert) {
                echo '<div class="alert" style="background: blue">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Category Updated Successfully!</strong>
                    </div>';
            }
        }


        //deleting categories
        if (isset($_POST['deleteCat'])) {
            $deleteid = $_POST['catid'];
            $deleteCat = "DELETE FROM `categories` WHERE category_id = '$deleteid'";
            mysqli_query($conn, $deleteCat);
            $alert = true;
            if ($alert) {
                echo '<div class="alert" style="background: red">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Category Deleted Successfully!</strong>
                    </div>';
            }
        }


        // Deleting queries
        if (isset($_POST['delete'])) {
            $deleteId = $_POST['id'];
            $query = "DELETE FROM `queries` WHERE query_id = $deleteId";
            $result = mysqli_query($conn, $query);
            $alert = true;
            if ($alert) {
                echo '<div class="alert" style="background: red">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Query Deleted Successfully!</strong>
                </div>';
            }
        }


        // Deleting replies 
        if (isset($_POST['replyDelete'])) {
            $replyDeleteId = $_POST['replyid'];
            $deleteReply = "DELETE FROM `replies` WHERE reply_id = $replyDeleteId";
            $deleteResult = mysqli_query($conn, $deleteReply);
            $alert = true;
            if ($alert) {
                echo '<div class="alert" style="background: red">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Replies Deleted Successfully!</strong>
                    </div>';
            }
        }

    ?>

        <!-- Header Section  -->
        <div class="header">
            <p class="headerTitle">ADMIN PANEL</p>
            <p class="username"><b>admin:</b> <?php echo $adminUsername ?></p>
        </div>

        <!-- Section 2  -->
        <div class="container">

            <div class="buttons">
                <button class="adminBtn" id="CategoryBtn" onclick="showCategories()">Categories</button>
                <button class="adminBtn" id="QueryBtn" onclick="showQueries()">Queries</button>
                <button class="adminBtn" id="ReplyBtn" onclick="showReplies()">Replies</button>
            </div>


            <div id="categorySec" class="section2">
                <form class="categoryForm" method="post" enctype="multipart/form-data">
                    <div class="category">
                        <div class="cat">
                            <label for="categoryName" class="categoryText">Category Name</label>
                            <input required name="categoryName" type="text" id="categoryInputName" placeholder="Enter the title">
                        </div>
                        <div class="cat">
                            <label for="categoryType" class="categoryText">Category Type</label>
                            <select id="categoryType" name="categoryType" class="profileInput">
                                <option value="programming">Programming</option>
                                <option value="framework">Framework</option>
                            </select>
                        </div>
                    </div>
                    <div class="cat">
                        <label for="categoryType" class="categoryText">Select a suitable image for the topic</label>
                        <input class="button button2" type="file" name="fileToUpload" id="fileToUpload" required="required">
                    </div>
                    <div class="cat">
                        <label for="categoryDesc" class="categoryText">Category Description</label>

                        <textarea name="categoryDesc" id="categoryInputDesc" cols="30" rows="10"></textarea>
                    </div>

                    <button name="add" class="addSubmit">Add</button>
                </form>

                <h2 class="catHeading">Categories</h2>

                <?php

                $sql4 = "SELECT * FROM `categories`";
                $result4 = mysqli_query($conn, $sql4);
                while ($row4 = mysqli_fetch_assoc($result4)) {

                    echo '<form class="categories" method="post">
                <label for="catTitle" class="categoriesText">Title</label>
                <input class="categoryInput" value="' . $row4['category_name'] . '" name="catTitle">

                <label for="catDesc" class="categoriesText">Description</label>
                <textarea class="categoryInput" name="catDesc">' . $row4['category_description'] . '</textarea>


                <input type="hidden" name="catid" value="' . $row4['category_id'] . '">
                <div class="catbtns">
                    <button id="updateCat" class="btn" name="updateCat">Update</button>
                    <button id="deleteCat" class="btn" name="deleteCat">Delete</button>
                </div>
            </form>';
                }
                ?>

            </div>
        </div>



        <div id="querySec" class="section2">

            <?php



            $sql = "SELECT * FROM `queries` ORDER BY query_time DESC LIMIT 10";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $queryTitle = $row['query_title'];
                $queryDesc = $row['query_desc'];
                $queryId = $row['query_id'];
                $catname = $row['query_cat_name'];
                $queryUserId = $row['query_user_id'];

                $sql5 = "SELECT * FROM `users` WHERE user_id= $queryUserId";
                $result5 = mysqli_query($conn, $sql5);
                $row5 = mysqli_fetch_assoc($result5);

                echo '<div class="query">
                
                <!-- <img class="userProfile" src="./icons/userdefault.png" alt="user profile"> -->
                <div class="queryDetails">
                    <h3><a class="queryTitle" href="./replies.php?catName=' . $catname . '&queryId=' . $queryId . '">' . $queryTitle . '</a>
                    </h3>
                    <p class="queryDesc" style="white-space: pre-line">' . $queryDesc . '</p>
                    <p class="userName">username</p>
                </div>
                <div class="user">
                        <!-- <img class="userProfile" src="./icons/userdefault.png" alt="user profile"> -->
                        <em>
                            <b><p class="userName">' . $row5['user_name'] . '</p></b>
                            <p class="userName">' . $row['query_time'] . '</p>
                        </em>
                </div>
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="' . $queryId . '">
                <input type="submit" class="deleteBtn" value="Delete" name="delete">
            </form>';
            }
            ?>
        </div>



        <div id="replySec" class="section2">


        <?php




        $sql1 = "SELECT * FROM `replies` ORDER BY reply_time DESC LIMIT 14";
        $result1 = mysqli_query($conn, $sql1);

        while ($row = mysqli_fetch_assoc($result1)) {
            $replyDesc = $row['reply_desc'];
            $reply_query_Id = $row['query_id'];
            $replyId = $row['reply_id'];
            $replyUserId = $row['reply_user_id'];

            $sql2 = "SELECT * FROM `queries` WHERE query_id='$reply_query_Id'";
            $result2 = mysqli_query($conn, $sql2);
            $row1 = mysqli_fetch_assoc($result2);


            $sql3 = "SELECT * FROM `users` WHERE user_id = $replyUserId";
            $result3 = mysqli_query($conn, $sql3);
            $row2 = mysqli_fetch_assoc($result3);

            echo '<div class="reply">
                        <div class="replyDetails">
                        <h3 ><a class="queryTitle" href="">' . $row1['query_title'] . '</a></h3>
                        
                            <pre class="replyDesc" style="white-space: pre-wrap">' . $replyDesc . '
                                    </pre>
                            <div class="user">
                                <!-- <img class="userProfile" src="./icons/userdefault.png" alt="user profile"> -->
                                <em>
                                    <b><p class="userName">' . $row2['user_name'] . '</p></b>
                                    <p class="userName">' . $row['reply_time'] . '</p>
                                </em>
                            </div>
                        </div>
                        <form method="POST">
                            <input type="hidden" name="replyid" value="' . $replyId . '">
                            <input type="submit" class="deleteBtn" value="Delete" name="replyDelete">
                        </form>
                    </div>';
        }
    } else {
        echo '<div class="error">
                    <img class="caution_icon" src="./icons/triangle-exclamation-solid.svg" alt="caution">
                    <p class="errorMessge">Access Denied - You are not an Admin.</p>
                </div>';
    }
        ?>



        </div>
</body>

<script src="./scripts/admin.js"></script>

</html>