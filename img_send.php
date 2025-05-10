<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="#" method="post" enctype="multipart/form-data">
    <label>Select image:</label>
    <input type="file" name="image" accept="image/*" required>
    <input type="submit" value="Upload Image">
</form>
</body>
</html>

<?php
// Database connection
include('config.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get image details
$imageName = $_FILES['image']['name'];
$imageData = file_get_contents($_FILES['image']['tmp_name']);

$stmt = $conn->prepare("INSERT INTO users (profile_picture) VALUES (?)");

// Fix bind_param: only "b" since you're sending 1 parameter (the blob)
$null = NULL;
$stmt->bind_param("b", $null); // Use only one param, which will be set in send_long_data

// Now send the actual image data
$stmt->send_long_data(0, $imageData);


if ($stmt->execute()) {
    echo "Image uploaded successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
