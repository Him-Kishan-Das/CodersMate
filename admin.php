<?php
        $username = $_GET['userid'];
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

    <!-- Header Section  -->
    <div class="header">
        <p class="headerTitle">ADMIN PANEL</p>
        <p class="username"><b>admin:</b> <?php echo $username ?></p>
    </div>

    <!-- Section 2  -->
    <div class="container">

        <div class="buttons">
            <button class="adminBtn" id="CategoryBtn" onclick="showCategories()">Categories</button>
            <button class="adminBtn" id="QueryBtn" onclick="showQueries()">Queries</button>
            <button class="adminBtn" id="ReplyBtn" onclick="showReplies()">Replies</button>
        </div>

        <?php
        if (isset($_POST['add'])) {
            $catName = $_POST['categoryName'];
            $catType = $_POST['categoryType'];
            $catDesc = $_POST['categoryDesc'];

            $select = "SELECT * FROM `categories` ORDER BY category_id DESC LIMIT 1";
            $catresult = mysqli_query($conn, $select);
            $row3 = mysqli_fetch_assoc($catresult);
            $catid = $row3['category_id'];
            $catid++;

            $insert = "INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_type`, `created`) VALUES ('$catid', '$catName','$catDesc',  '$catType',current_timestamp())";
            $final = mysqli_query($conn, $insert);
        }


        ?>
        <div id="categorySec" class="section2">
            <form class="categoryForm" method="post">
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
                    <label for="categoryDesc" class="categoryText">Category Description</label>

                    <textarea name="categoryDesc" id="categoryInputDesc" cols="30" rows="10"></textarea>
                </div>

                <button name="add" class="addSubmit">Add</button>
            </form>

            <h2 class="catHeading">Categories</h2>

            <?php

            // updating categories 
            if(isset($_POST['updateCat'])){
                $title = $_POST['catTitle'];
                $desc = $_POST['catDesc'];
                $id = $_POST['catid'];
                $update = "UPDATE `categories` SET `category_name` = '$title', `category_description` = '$desc' WHERE category_id = '$id'";
                $updateQuery = mysqli_query($conn, $update);
            }


            //deleting categories
            if(isset($_POST['deleteCat'])){
                $deleteid = $_POST['catid'];
                $deleteCat = "DELETE FROM `categories` WHERE category_id = '$deleteid'";
                mysqli_query($conn, $deleteCat);
            }

            $sql4 = "SELECT * FROM `categories`";
            $result4 = mysqli_query($conn, $sql4);
            while($row4 = mysqli_fetch_assoc($result4)){

            echo '<form class="categories" method="post">
                <label for="catTitle" class="categoriesText">Title</label>
                <input class="categoryInput" value="'. $row4['category_name'] .'" name="catTitle">

                <label for="catDesc" class="categoriesText">Description</label>
                <textarea class="categoryInput" name="catDesc">'. $row4['category_description'] .'</textarea>


                <input type="hidden" name="catid" value="'. $row4['category_id'] .'">
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

        // Deleting 
        if (isset($_POST['delete'])) {
            $deleteId = $_POST['id'];
            $query = "DELETE FROM `queries` WHERE query_id = $deleteId";
            $result = mysqli_query($conn, $query);
        }

        $sql = "SELECT * FROM `queries` ORDER BY query_time DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $queryTitle = $row['query_title'];
            $queryDesc = $row['query_desc'];
            $queryId = $row['query_id'];
            $catname = $row['query_cat_name'];

            echo '<div class="query">
                
                <!-- <img class="userProfile" src="./icons/userdefault.png" alt="user profile"> -->
                <div class="queryDetails">
                    <h3><a class="queryTitle" href="./replies.php?catName=' . $catname . '&queryId=' . $queryId . '">' . $queryTitle . '</a>
                    </h3>
                    <p class="queryDesc" style="white-space: pre-line">' . $queryDesc . '</p>
                    <p class="userName">username</p>
                </div>
                <!-- <div class="queryStats">
                    <h4 class="queryStatsTitle">Replies: &nbsp;</h4>
                    <p class="queryStatsValue"></p>
                </div> -->
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

        // deleting replies 
        if (isset($_POST['replyDelete'])) {
            $replyDeleteId = $_POST['replyid'];
            $deleteReply = "DELETE FROM `replies` WHERE reply_id = $replyDeleteId";
            $deleteResult = mysqli_query($conn, $deleteReply);
        }


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

        ?>

    </div>
</body>

<script src="./scripts/admin.js"></script>

</html>