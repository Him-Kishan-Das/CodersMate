
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate - Replies</title>
    <link rel="stylesheet" href="./styles/replies.css">
</head>

<body>
    <?php
    include './Components/dbconnect.php';
    include './Components/Navbar.php';
    ?>
    <div class="container">

        <?php
        $query_id = $_GET['queryId'];
        $sql = "SELECT * FROM `queries` WHERE query_id = '$query_id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $queryTitle = $row['query_title'];
            $queryDesc = $row['query_desc'];
            $query_user_id = $row['query_user_id'];
            $sql1 = "SELECT * FROM `users` WHERE user_id = '$query_user_id'";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);

        }
        ?>

        <!-- Insetion of replies of a thread to the database -->
        <?php
        $method = $_SERVER["REQUEST_METHOD"];
        $alert = false;
        if ($method == 'POST') {
            $formDesc = $_POST['answer'];
            $sql1 = "INSERT INTO `replies` (`reply_desc`, `query_id`, `reply_user_id`, `reply_time`) VALUES ('$formDesc', '$query_id', '0', current_timestamp())";
            mysqli_query($conn, $sql1);
            $alert = true;
        }
        if ($alert) {
            echo ' <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Reply Submitted Successfully!</strong>
                    </div>';
       }

        ?>
        <div class="block">
            <h2 class="title"><?php echo $queryTitle ?></h2>
            <pre class="para" style="white-space: pre-wrap"><?php echo $queryDesc  ?></pre>
            <button class="replyBtn" onclick="askQuery()">Post Reply</button>
            <div class="user">
                <h2 class="posted">Posted by : &nbsp;</h2>
                <p class="userName"><?php echo $row1['user_name'] ?></p>
            </div>
            
        </div>



        <div id="queryForm">
            <form action="<?php $_SERVER['REQUEST_URI'] ?>" class="formFields" method="post">
                <label for="queryDesc" class="queryText">Post Reply</label>

                <textarea placeholder="Enter a Solution" class="queryInput" id="queryInputDesc" name="answer" cols="30" rows="5" style="white-space: pre-wrap;"></textarea>

                <button class="replySubmitBtn">Submit</button>
            </form>
        </div>

        <div class="replyList">
            <h2 class="replyListHeading">Replies</h2>


            <?php
            $sql2 = "SELECT * FROM `replies` WHERE query_id = '$query_id'";
            $result = mysqli_query($conn, $sql2);
            $noReplies = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noReplies = false;
                $replyDesc = $row['reply_desc'];
                $replyTime = $row['reply_time'];
                $replyUserId = $row['reply_user_id'];

                // For accessing the data in the users table 
                $sql3 = "SELECT * FROM `users` WHERE user_id = '$replyUserId'";
                $result3 = mysqli_query($conn, $sql3);
                $row = mysqli_fetch_assoc($result3);
                $userName = $row['user_name'];
                echo '<hr>
                    <div class="query">
                        <div class="replyDetails">
                            <pre class="replyDesc" style="white-space: pre-wrap">' . $replyDesc . '
                            </pre>
                            <div class="user">
                                <img class="userProfile" src="./icons/userdefault.png" alt="user profile">
                                <p class="userName">'. $userName .' &nbsp; </p>
                                <p class="userName">' . $replyTime . '</p>
                            </div>
                        </div>
                        
                    </div>';
            }

            if($noReplies){
                echo '<h3 class="emptyMessage">No answers to this query till now.</h3>';
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