<?php
include('../config.php');
include('password_helper.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['username_txt'];
    $password = $_POST['password_txt'];
    $repeat_password = $_POST['repeat_password'];

    // Check if password and repeat password match
    if ($password !== $repeat_password) {
        echo "❌ Passwords don't match!";
    } else {
        // Check password length and strength
        if (strlen($password) < 12) {
            echo "❌ The password must be at least 12 characters.";
        } else {
            if (isValidPassword($password)) {
                
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

               
                $sql = 'INSERT INTO Users (username, user_password) VALUES (?, ?)';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $username, $hashed_password);

                
                if ($stmt->execute()) {
                    echo "✅ Account has been successfully created.";
                } else {
                    echo " Error: " . $stmt->error;
                }

               
                $stmt->close();
                $conn->close();
            } else {
                echo "❌ Password must have at least 1 uppercase, 1 lowercase, 1 number, and 1 special character.";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
    <form action="#" method= "post">
        <label for="username">Username:</label>
        <input type="text" name="username_txt" required><br>

        <label for="password">Password:</label>
        Password<input type="password" name='password_txt' required><br>

        <label for="repeat_password">Repeat-Password:</label>
        <input type="password" name='repeat_password' required><br>

        <button>Submit</button>
    </form>
    <button> <a href="log_in.php">Click to sign in</a></button>
   
</body>
</html>