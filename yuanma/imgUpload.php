<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
</head>
<body>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["headImg"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["headImg"]["tmp_name"]);
    if($check !== false) {
        echo "Image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<br>File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<br>Sorry, image already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["headImg"]["size"] > 5000000) {
    echo "<br>Sorry, your image is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br>Sorry, your image was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["headImg"]["tmp_name"], $target_file)) {
        echo "<br>The file ". basename( $_FILES["headImg"]["name"]). " has been uploaded.";
    } else {
        echo "<br>Sorry, there was an error uploading your file.";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zlfDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$userNumber=$_SESSION["userId"];

$sql = "UPDATE MyGuests SET headfile='$target_file' WHERE id='$userNumber'";

if (mysqli_query($conn, $sql)) {
    echo "<br>The image have been uploaded into the database.
    <br><img src='$target_file' alt='userHead' width='200' height='200'>";
} else {
    echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

<hr>
<button><a href="homePage.php" target="_self">返回主页面</a></button>

</body>
</html>