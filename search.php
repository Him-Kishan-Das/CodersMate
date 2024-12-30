<?php
    $search = $_GET['search'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate - <?php echo $search ?></title>
    <link rel="stylesheet" href="./styles/search.css">
</head>
<body>
    <?php
        include './Components/dbconnect.php';
        include './Components/Navbar.php'
    ?>

    <div class="container">
        <h1 class="searchHeading">Search results for <em><?php echo $search ?></em></h1>

        <?php

        $sql = "SELECT * FROM queries WHERE MATCH(query_title, query_desc) against ('$search')";
        $result = mysqli_query($conn, $sql);
        $numSearchResults = mysqli_num_rows($result);

        echo '<div class="numberofSearch">'. $numSearchResults .' Results found</div>
               <hr> ';

               if($numSearchResults>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $cat_name = $row['query_cat_name'];
                        $queryTitle = $row['query_title'];
                        $queryDesc = $row['query_desc'];
                        $queryId = $row['query_id'];
                        $sql1 = "SELECT * FROM replies WHERE query_id = '$queryId'";
                        $result1 = mysqli_query($conn, $sql1);
                        $numReplies = mysqli_num_rows($result1);
                        echo '<div class="searchItems">
                                    <!-- <img class="userProfile" src="./icons/userdefault.png" alt="user profile"> -->
                                    <div class="searchDetails">
                                        <h3 ><a class="queryTitle" href="./replies.php?catName=' . $cat_name . '&queryId=' . $queryId. '">'. $queryTitle .'</a>
                                        </h3>
                                        <p class="queryDesc">'. $queryDesc .'</p>
                                        <p class="userName">him kishan das</p>
                                    </div>
                                        <div class="queryStats">
                                            <h4 class="queryStatsTitle">Replies: &nbsp; </h4>
                                            <p class="queryStatsValue"> '. $numReplies .'</p>
                                    </div>
                            </div>';
                    }
                 }

                 else{
                    echo '<div class="searchNotFound">
                    <img src="./icons/face-frown-regular.svg" class="notFoundIcon">
                    <p class="notFoundPara">We couldn\'t find anything for <em><b>'. $search .'</b></em></p>
                    <p style="padding: 15px;">
                    <b>Suggestions:</b>
                         <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                            <li>Try fewer keywords.</li>
                         </ul>
                    </p>
                </div>';
                 }

        ?>

        
    </div>
</body>
</html>
