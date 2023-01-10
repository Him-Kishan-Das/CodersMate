<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include './dbconnect.php';
        $loginEmail = $_POST['loginEmail'];
        $loginPassword = $_POST['loginPassword'];
        $sql = "SELECT * FROM `users`  WHERE  `user_email` = '$loginEmail'";
        $result = mysqli_query($conn, $sql);
        $checkUser = mysqli_num_rows($result);
        if($checkUser == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($loginPassword, $row['user_password'])){
                session_start();
                $_SESSION['logIn'] = true;
                $_SESSION['userEmail'] = $loginEmail;
                $_SESSION['userId'] = $row['user_id'];
                $role = $row['user_role'];
                if($role == "admin"){
                    $_SESSION['admin'] = true;
                }
                echo "logging successful";
                header("Location: /CodersMate/home.php");
            }
            else{
                // $_SESSION['logFail'] = true;
                header("Location: /CodersMate/home.php?login=fail");
            }
        }
        else{
            header("Location: /CodersMate/home.php?login=fail");
        }
    }
?>