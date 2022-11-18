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
        <p class="username"><b>admin:</b> him_kishan_das</p>
    </div>

    <!-- Section 2  -->
    <div class="container">

        <div class="buttons">
            <button class="adminBtn" id="CategoryBtn" onclick="showCategories()">Categories</button>
            <button class="adminBtn" id="QueryBtn" onclick="showQueries()">Queries</button>
            <button class="adminBtn" id="ReplyBtn" onclick="showReplies()">Replies</button>
        </div>

        

        <div id="categorySec" class="section2">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur minima nostrum dicta quia, autem incidunt perferendis voluptates debitis quos, quod, fuga consequuntur! Corporis sapiente dolorum atque necessitatibus reprehenderit corrupti ipsa?
        </div>

        <div id="querySec" class="section2">

        <?php

        // Deleting 
        if(isset($_POST['delete'])){
            $deleteId = $_POST['id'];
            $query = "DELETE FROM `queries` WHERE query_id = $deleteId";
            $result = mysqli_query($conn, $query);
        }

        $sql = "SELECT * FROM `queries` ORDER BY query_time DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $queryTitle = $row['query_title'];
            $queryDesc = $row['query_desc'];
            $queryId = $row['query_id'];
            $catname = $row['query_cat_name'];
        
            echo '<div class="query">
                
                <!-- <img class="userProfile" src="./icons/userdefault.png" alt="user profile"> -->
                <div class="queryDetails">
                    <h3><a class="queryTitle" href="./replies.php?catName='. $catname .'&queryId='. $queryId .'">'. $queryTitle .'</a>
                    </h3>
                    <p class="queryDesc" style="white-space: pre-line">'. $queryDesc .'</p>
                    <p class="userName">username</p>
                </div>
                <!-- <div class="queryStats">
                    <h4 class="queryStatsTitle">Replies: &nbsp;</h4>
                    <p class="queryStatsValue"></p>
                </div> -->
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="'. $queryId .'">
                <input type="submit" class="deleteBtn" value="Delete" name="delete">
            </form>';


        }
        ?>
        </div>

        <div id="replySec" class="section2">
        <div class="replyDetails">
                            <pre class="replyDesc" style="white-space: pre-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex officia autem aliquid. Voluptatibus nesciunt maxime esse quod autem eum accusantium odio non perspiciatis quidem. Non quos fugit blanditiis alias quaerat.
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus, provident iusto. Exercitationem minus doloremque odit minima saepe voluptatibus, enim molestias dolorum officia, corrupti at.
                            </pre>
                            <div class="user">
                                <!-- <img class="userProfile" src="./icons/userdefault.png" alt="user profile"> -->
                                <em><p class="userName">username &nbsp; </p>
                                <p class="userName">10 oct</p></em>
                            </div>
                        </div>
        </div>

    </div>
</body>

<script src="./scripts/admin.js"></script>

</html>