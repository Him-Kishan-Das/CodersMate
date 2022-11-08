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
        $id = $_GET['queryId'];
        $sql = "SELECT * FROM `queries` WHERE query_id = '$id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $queryTitle = $row['query_title'];
            $queryDesc = $row['query_desc'];
        }
    ?>
        <div class="block">
            <h2 class="title"><?php echo $queryTitle ?></h2>
            <p class="para"><?php echo $queryDesc  ?></p>
            <div class="user">
                <h2 class="posted">Posted by : </h2>
                <p class="userName">him-kishan . </p>
            </div>
            <button class="replyBtn" onclick="askQuery()">Post Reply</button>
        </div>

        <div id="queryForm">
            <form action="" class="formFields" method="post">
                <label for="queryDesc" class="queryText">Post Reply</label>

                <textarea placeholder="Enter a Solution" class="queryInput" id="queryInputDesc" name="queryDesc" cols="30" rows="5"></textarea>

                <button class="replySubmitBtn">Submit</button>
            </form>
        </div>

        <div class="replyList">
            <h2 class="replyListHeading">Replies</h2>


            <hr>
            <div class="query">

                <div class="replyDetails">
                    <p class="replyDesc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, magnam voluptas vel quidem facere aperiam sapiente nobis fugit sint, officiis deserunt eaque esse voluptatem at excepturi harum consequatur maiores voluptatum.
                        dhsfjh sdajf
                        sdjhf jkhsadjkfh
                    </p>
                    <div class="user">
                        <img class="userProfile" src="./icons/userdefault.png" alt="user profile">
                        <p class="userName">him-kishan . </p>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <?php
    include './Components/Footer.php';
    ?>
</body>
<script src="./scripts/query.js"></script>

</html>