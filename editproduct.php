<?php
session_start();
if(isset($_SESSION['validmem']) && isset($_SESSION['level'])){
    if($_SESSION['validmem']==1 && $_SESSION['level']=='M'){
        if( isset($_POST['oldprice']) && isset($_POST['newprice']) && isset($_POST['Properties']) ){
            try {
                $conn = new mysqli('localhost', 'root', '', 'projectwp');
                $qrstr = "UPDATE `product` SET `new_price` = '".$_POST['newprice']."',`old_price` = '".$_POST['oldprice']."',`Properties` = '".$_POST['Properties']."' WHERE `product`.`ID` = '".$_SESSION['prodidedit']."';";
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
        }
    else{
        header('location:main-page.php');
    }
}
else{
    header('location:main-page.php');
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

    <link rel="stylesheet" href="sorcaddimg.css">

</head>

<body>
<div class="navbar navbar-expand-md fixed-top navbar-dark bg-dark text-white">
    <a href="Home.php" class="logo"> <i class="fas fa-store"></i> Home page </a>
</div >
<?php
$NP="";
$OP="";
$prp="";
if(isset($_GET['x'])){
    $_SESSION['prodidedit']=$_GET['x'];
try{
    $conn = new mysqli('localhost','root','','projectwp');
    $qrstr="select * from product";
    $ii=0;
    $res=$conn->query($qrstr);
    for($i=0;$i<$res->num_rows;$i++) {
        $row = $res->fetch_object();
        if ($row->ID == $_GET['x']) {
            $NP = $row->new_price;
            $OP = $row->old_price;
            $prp = $row->Properties;
        }
    }

    $conn->close();
}
catch (Exception $ex){
    echo "<p>".$ex->getTraceAsString()."</p>";
}
}
?>
<div class="container w-50 p-3 " style="margin-top: 10%">
    <form action="editproduct.php" method="post" >

        <div class="row">
            <div class="col-25">
                <label for="Old price">Old price: </label>
            </div>
            <div class="col-75">
                <?php
                echo "<input type='text' name='oldprice' value='$OP' >";
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="new price">new price:</label>
            </div>
            <div class="col-75">
                <?php
                echo "<input type='text' name='newprice' value='$NP'>";
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="Properties">Properties: </label>
            </div>
            <div class="col-75">
                <?php
                echo " <textarea name='Properties' style='width: 300px; height: 100px;'>$prp</textarea>"
                ?>
            </div>
        </div>

        <div class="row">
            <input type="submit" value="Save changes">
        </div>
    </form>
</div>

</body>