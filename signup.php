<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// collect value of input field
    $name = $_POST['username'];
    $pas = $_POST['upass'];
    $uemale = $_POST["uemail"];
    $phoneno = $_POST["phonenumber"];
    $address = $_POST["address"];
    if (empty($name) || empty($pas) || empty($uemale) || empty($phoneno) || empty($address)) {

    } else {
        try {
            $conn = new mysqli('localhost', 'root', '', 'projectwp');
            $qrstr = "INSERT INTO `person` (`ID`, `Name`, `gmail`, `level`, `Address`, `phone_number`, `password`) VALUES (NULL, '" . $name . "', '" . $uemale . "', 'C', '" . $address . "', '" . $phoneno . "', '" . sha1($pas) . "');";
            $res = $conn->query($qrstr);
            if ($res == 1) {
                header('location:Login.php');
            } else {
                echo '<script>alert("some data entered is wrong") </script>';
            }
            $conn->commit();
            $conn->close();
        } catch (Exception $ex) {

        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
    <link rel="stylesheet" href="stylesignup.css">
    <title>sign up</title>
</head>
<body>
<div class="container">

    <div class="img-left">
        <img src="image/deal1.jpg" alt="programming background">
    </div>
    <div class="register">
        <div class="register-content">
            <div class="title">
                <h1>Create you account now</h1>
            </div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  >
                <input style="font-weight: bold;font-size:15px" type="text" placeholder="full name" name="username">
                <input style="font-weight: bold;font-size:15px" type="text" placeholder="phone number" name="phonenumber">
                <input style="font-weight: bold;font-size:15px" type="email" placeholder="email" name="uemail">
                <input style="font-weight: bold;font-size:15px" type="password" placeholder="password" name="upass">
                <input style="font-weight: bold;font-size:15px" type="text" placeholder="Address" name="address">
                <input style="font-weight: bold;font-size:15px" type="submit" value="sign up" onclick="">
            </form>
            <p>already have an account ? <a href="Login.php">login</a></p>
        </div>
    </div>
</div>

</body>
</html>
