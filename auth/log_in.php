<?php
session_start();
include('../config.php');


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM Users where username = ?";
        $stmt = $conn->prepare($sql);
        $stmt -> bind_param("s", $username);
        $stmt -> execute();
        $result = $stmt-> get_result();


        if($result->num_rows === 1){
            $row = $result-> fetch_assoc();

            if(password_verify($password, $row['user_password'])){
                echo "Log in successful!";
                $_SESSION ['username'] = $username;
                header("Location: ../pages/user/dashboard.php");
                exit;
            }else{
                echo "Invalid Account, please try again.";
            }
        }else{
            echo "No user found.";
        }

        $stmt->close();
        $conn->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        Username<input type="text" name='username'><br>
        Password<input type="password" name='password'><br>
        <button type='submit'>Sign in</button>

    </form>
</body>
</html>