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
    include './Components/dbconnect.php';
    ?>

    
</body>

</html>