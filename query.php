<?php
$cat_name = $_GET['catName'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate - <?php echo $cat_name; ?></title>
    <link rel="stylesheet" href="./styles/query.css">
</head>

<body>

    <?php
    include './Components/dbconnect.php';
    include './Components/Navbar.php';
    ?>

    <div class="container">

        <?php
        $method = $_SERVER["REQUEST_METHOD"];
        $alert = false;
        if ($method == 'POST') {
            $queryTitle = $_POST['queryTitle'];
            $queryTitle= str_replace("<", "&lt;", "$queryTitle");
            $queryTitle= str_replace(">", "&gt;", "$queryTitle");


            $queryDesc = $_POST['queryDesc'];
            $queryDesc= str_replace("<", "&lt;", "$queryDesc");
            $queryDesc= str_replace(">", "&gt;", "$queryDesc");

            $userId = $_SESSION['userId'];
            $sql = "INSERT INTO `queries` (`query_title`, `query_desc`, `query_cat_name`, `query_user_id`, `query_time`) VALUES ('$queryTitle', '$queryDesc', '$cat_name', '$userId', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $alert = true;
            if ($alert) {
                echo ' <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                            <strong>Query Submitted Successfully!</strong>
                        </div>';
            }
        }

        ?>

        <div class="block">

            <h2 class="title">Welcome to <?php echo $cat_name; ?> Forums</h2>
            <p class="para"><?php echo $cat_name; ?> related queries and topics should be posted/found in this page of the forum.</p>
            <button class="queryBtn" onclick="askQuery()">Ask a Query</button>
        </div>

        <?php

        if (isset($_SESSION['logIn']) && $_SESSION['logIn'] == true) {
            echo '<div id="queryForm">
                        <form action="'. $_SERVER["REQUEST_URI"]  .'" class="formFields" method="post">
                            <label for="queryTitle" class="queryText">Query Title</label>

                            <input required name="queryTitle" type="text" class="queryInput" id="queryInputTitle" placeholder="Enter your query">

                            <label for="queryDesc" class="queryText">Query Description</label>

                            <textarea required placeholder="Enter query description" class="queryInput" id="queryInputDesc" name="queryDesc" cols="30" rows="5"></textarea>

                            <button class="querySubmitBtn">Submit</button>
                        </form>
                    </div>';
        }

        else{
            echo '<div id="queryForm">Please log in to ask a question</div>';
        }

        ?>

        <div class="queryList">
            <h2 class="queryListHeading">Browse Queries</h2>

            <!-- For displaying the query list from the database -->
            <?php

            // For accessing data for query table 
            $cat_name = $_GET['catName'];
            $sql = "SELECT * FROM `queries` WHERE query_cat_name = '$cat_name'";
            $result = mysqli_query($conn, $sql);
            $noContent = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noContent = false;
                $id = $row['query_id'];
                $title = $row['query_title'];
                $desc = $row['query_desc'];
                $query_user_id = $row['query_user_id'];
                $query_time = $row['query_time'];

                // For accessing data from users table 
                $sql1 = "SELECT * FROM `users` WHERE user_id = '$query_user_id'";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $userName = $row1['user_name'];

                // For accessing data from replies table 
                $sql2 = "SELECT * FROM `replies` WHERE query_id = '$query_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $numReplies = mysqli_num_rows($result2);

                echo '
                        <div class="query">
                            
                            <div class="queryDetails">
                                <h3 ><a class="queryTitle" href="./replies.php?catName=' . $cat_name . '&queryId=' . $id . '"> ' . $title . ' </a>
                                </h3>
                                <p class="queryDesc">' . substr($desc, 0, 200) . '...</p>
                                <div class="prof">
                                    <img class="userProfile" src="./icons/userdefault.png" alt="user profile">
                                    <p class="userName">' . $userName . ' &nbsp; ' . $query_time . '</p>
                                </div>
                            </div>
                            <div class="queryStats">
                                <h4 class="queryStatsTitle">Replies: &nbsp;</h4>
                                <p class="queryStatsValue">' . $numReplies . '</p>
                            </div>
                        </div>';
            }

            if ($noContent) {
                echo '<h3 class="emptyMessage">No ' . $cat_name . ' related queries asked till now.</h3>';
            }
            ?>



        </div>

    </div>

    <?php
    include './Components/Footer.php';
    ?>
</body>
<script src="./scripts/query.js"></script>

</html>
