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
    include './Components/Navbar.php';
    include './Components/dbconnect.php'
    ?>

    <div class="container">

        <div class="block">

            <h2 class="title">Welcome to <?php echo $cat_name; ?> Forums</h2>
            <p class="para"><?php echo $cat_name; ?> related queries and topics should be posted/found in this page of the forum.</p>
            <button class="queryBtn" onclick="askQuery()">Ask a Query</button>
        </div>

        <div id="queryForm">
            <form action="" class="formFields" method="post">
                <label for="queryTitle" class="queryText">Query Title</label>

                <input name="queryTitle" type="text" class="queryInput" id="queryInputTitle" placeholder="Enter your query">

                <label for="queryDesc" class="queryText">Query Description</label>

                <textarea placeholder="Enter query description" class="queryInput" id="queryInputDesc" name="queryDesc" cols="30" rows="5"></textarea>

                <button class="querySubmitBtn">Submit</button>
            </form>
        </div>

        <div class="queryList">
            <h2 class="queryListHeading">Browse Queries</h2>

            <!-- For displaying the query list from the database -->
            <?php
            $cat_name = $_GET['catName'];
            $sql = "SELECT * FROM `queries` WHERE query_cat_name = '$cat_name'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['query_id'];
                $title = $row['query_title'];
                $desc = $row['query_desc'];
                $query_user_id = $row['query_user_id'];
                $query_time = $row['timestamp'];

                echo '<hr>
            <div class="query">
                <img class="userProfile" src="./icons/userdefault.png" alt="user profile">
                <div class="queryDetails">
                    <h3 ><a class="queryTitle" href="./replies.php?queryId=' . $id .'"> '. $title . ' </a>
                    </h3>
                    <p class="queryDesc">' . substr($desc, 0, 100) .'...</p>
                    <p class="userName">him-kishan . '. $query_time .'</p>
                </div>
                <div class="queryStats">
                    <h4 class="queryStatsTitle">Answers: </h4>
                    <p class="queryStatsValue">10</p>
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