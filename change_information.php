<?php
session_start();
if(isset($_SESSION['validmem'])) {
    if ($_SESSION['validmem'] == 1) {


    } else {
        header('location:main-page.php');
    }
}
else{
    header('location:main-page.php');
}
if(isset($_POST['address']) && isset($_POST['gmail']) && isset($_POST['phoneno']) ){
    try {
        $conn = new mysqli('localhost', 'root', '', 'projectwp');
        $qrstr = "UPDATE `person` SET `phone_number` = '".$_POST['phoneno']."',`gmail` = '".$_POST['gmail']."',`Address` = '".$_POST['address']."' WHERE `person`.`ID`='".$_SESSION['personid']."'";
        $res = $conn->query($qrstr);
        if ($res == 1) {
            header('location:Home.php');
        } else {
            echo '<script>alert("some data entered is wrong") </script>';
        }
        $conn->commit();
        $conn->close();
    } catch (Exception $ex) {

    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        FURNITURE N&M Company
    </title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="change%20information.css">
</head>

<body>

<div class="navbar navbar-expand-md fixed-top navbar-dark bg-dark text-white">
    <a href="Home.php" class="logo"> <i class="fas fa-store"></i> Home page </a>
</div >

<?php
$add="";
$phon="";
$gmail1="";
 try{
            $conn = new mysqli('localhost','root','','projectwp');
            $qrstr="select * from person";
            $ii=0;
            $res=$conn->query($qrstr);
            for($i=0;$i<$res->num_rows;$i++){
                $row=$res->fetch_object();
                if($row->ID==$_SESSION['personid']){
                    $add=$row->Address;
                    $phon=$row->phone_number;
                    $gmail1=$row->gmail;
                }

            }
            $conn->close();
        }
        catch (Exception $ex){
            echo "<p>".$ex->getTraceAsString()."</p>";
    }
?>
<div class="container w-50 p-3 " >
    <form action="change_information.php" method="post" >

        <div class="row">
            <div class="col-25">
                <label for="address">Address: </label>
            </div>
            <div class="col-75">
                <?php
                echo "  <input type='text' name='address' value='$add'>";
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="gmail">gmail:</label>
            </div>
            <div class="col-75">
                <?php
                echo " <input type='text' name='gmail' value='$gmail1'>";
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="phno">phone number: </label>
            </div>
            <div class="col-75">
                <?php
                echo "<input type='text' name='phoneno' value='$phon'>";
                ?>
            </div>
        </div>

        <div class="row">
            <input type="submit" value="Save changes">
        </div>
    </form>
</div>

</body>