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

    <div class="header">
        <p class="headerTitle">ADMIN PANEL</p>
        <p class="username"><b>admin:</b> him_kishan_das</p>
    </div>
</body>

</html>