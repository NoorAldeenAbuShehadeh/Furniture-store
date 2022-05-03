<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['username'];
    $pas=$_POST['password'];
    if (empty($name) || empty($pas)) {

    } else {
        try{
            $conn = new mysqli('localhost','root','','projectwp');
            $qrstr="select * from person";
            $ii=0;
            $res=$conn->query($qrstr);
            for($i=0;$i<$res->num_rows;$i++){
                $row=$res->fetch_object();
                if(($name==$row->Name)&&(sha1($pas)==$row->password)){
                    $_SESSION['validmem']=1;
                    $_SESSION['level']=$row->level;
                    $_SESSION['personid']=$row->ID;
                    header('location:Home.php');
                    $ii=1;
                }
            }
            if($ii==0){
                echo '<script> alert("username and/or password is/are wrong please enter again") </script>';
            }
            $conn->close();
        }
        catch (Exception $ex){
            echo "<p>".$ex->getTraceAsString()."</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
    <link rel="stylesheet" href="stylelogin.css">
    <title>login</title>
</head>
<body>

<div class="parent container" >
    <div class="welcome container">
        <div class="welcome-content ">
            <h1>welcome in furniture company</h1>
        </div>
        <div class="sign_up">
            <p> <b>do not have an account ?</b> </p>
            <button onclick="location.href='signup.php'" style="background-color: burlywood; color: black; font-size: 20px; width: 100px; height: 40px"> <b>sign up </b></button>
        </div>
    </div>
    <div class="login container" >
        <div class="login-content">
            <div class="title-social">
                <h3>sign in</h3>
                <ul>
                    <li><a href="https://ar-ar.facebook.com/pages/category/Mattress-Manufacturer/%D8%A7%D8%A8%D9%88%D8%B4%D8%AD%D8%A7%D8%AF%D8%A9-%D9%84%D9%84%D9%85%D9%81%D8%B1%D9%88%D8%B4%D8%A7%D8%AA-1660361480892908/"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="https://www.instagram.com/"><i class="fab fa-instagram-square"></i></a></li>
                </ul>

            </div>
            <br>
            <br>
            <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h4>username</h4>
                <input type="text" name="username">
                <h4>password</h4>
                <input type="password" name="password">

                <input type="submit" value="sign in" style="font-size: 20px;">
            </form>
        </div>

    </div>
</div>

</body>
</html>