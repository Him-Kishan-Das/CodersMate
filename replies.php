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
    include './Components/Navbar.php';
    include './Components/dbconnect.php'
    ?>
    <div class="container">

        <?php
        $query_id = $_GET['queryId'];
        $sql = "SELECT * FROM `queries` WHERE query_id = '$query_id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $queryTitle = $row['query_title'];
            $queryDesc = $row['query_desc'];
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
            <p class="para"><?php echo $queryDesc  ?></p>
            <button class="replyBtn" onclick="askQuery()">Post Reply</button>
            <div class="user">
                <h2 class="posted">Posted by : </h2>
                <p class="userName">him-kishan . </p>
            </div>
            
        </div>



        <div id="queryForm">
            <form action="<?php $_SERVER['REQUEST_URI'] ?>" class="formFields" method="post">
                <label for="queryDesc" class="queryText">Post Reply</label>

                <textarea placeholder="Enter a Solution" class="queryInput" id="queryInputDesc" name="answer" cols="30" rows="5"></textarea>

                <button class="replySubmitBtn">Submit</button>
            </form>
        </div>

        <div class="replyList">
            <h2 class="replyListHeading">Replies</h2>


            <?php
            $sql2 = "SELECT * FROM `replies` WHERE query_id = '$query_id'";
            $result = mysqli_query($conn, $sql2);
            while ($row = mysqli_fetch_assoc($result)) {
                $replyDesc = $row['reply_desc'];
                $replyTime = $row['reply_time'];
                echo '<hr>
                    <div class="query">
                        <div class="replyDetails">
                            <p class="replyDesc">' . $replyDesc . '
                            </p>
                            <div class="user">
                                <img class="userProfile" src="./icons/userdefault.png" alt="user profile">
                                <p class="userName">him-kishan  &nbsp; </p>
                                <p class="userName">' . $replyTime . '</p>
                            </div>
                        </div>
                        
                    </div>';
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