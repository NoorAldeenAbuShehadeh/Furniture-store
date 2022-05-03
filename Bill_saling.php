<?php
session_start();
if(isset($_SESSION['validmem'])){
    if($_SESSION['validmem']==1){

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
    <title>show all products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>


<div class="navbar navbar-expand-md fixed-top navbar-dark bg-dark text-white">
    <a href="Home.php" class="logo"> <i class="fas fa-store"></i> Home page </a>
</div >

<form action="Bill_saling.php" method="post">
<p style="margin-top: 50px; margin-left: 10px; ">Enter the date: <input type="date" name="datepr">
    <input type="submit" value="calculate">
</p>
</form>
<?php

if(isset($_POST['datepr'])){
    $orid=0;
    $count=0;
    $arr[0]=0;
    $totalprice=0;
    echo '<div class="container" style="margin-top: 30px;">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>product ID</th>
            <th>product type</th>
            <th>price</th>
            <th>Properties</th>
            <th>image</th>
        </tr>
        </thead>

        <tbody>';
    try{
        $conn = new mysqli('localhost','root','','projectwp');
        $qrstr="select * from orders";
        $res=$conn->query($qrstr);
        for($i=0;$i<$res->num_rows;$i++) {
            $row=$res->fetch_object();
            if($row->person_id==$_SESSION['personid'] && $row->order_date==$_POST['datepr']){
                $orid=$row->order_id;
            }
        }
        $qrstr="select * from order_product";
        $res=$conn->query($qrstr);
        for($i=0;$i<$res->num_rows;$i++) {
            $row=$res->fetch_object();
            if($row->order_id==$orid){
                $arr[$count]=$row->product_id;
                $count++;
            }
        }
        $conn->close();
    }catch (Exception $e){
    }
    try{

        for($j=0;$j<$count;$j++) {
            $conn = new mysqli('localhost','root','','projectwp');
            $qrstr="select * from product";
            $res=$conn->query($qrstr);
            for ($i = 0; $i < $res->num_rows; $i++) {
                $row=$res->fetch_object();
                $x=$row->ID;
                if($arr[$j]==$x){
                    echo "<tr>";
                    echo "<td class='row-data' >$row->ID</td>";
                    echo "<td >$row->Type</td>";
                    echo "<td>$row->new_price</td>";
                    echo "<td>$row->Properties</td>";
                    echo "<td><img src='".$row->image_url."' alt='' style='width: 200px; height: 150px;'></td>";
                    echo "</tr>";
                    $totalprice+=intval($row->new_price);
                }
            }
            $conn->close();
        }
        echo "<tr>";
        echo "<td ></td>";
        echo "<td ></td>";
        echo "<td></td>";
        echo "<td style='font-size: 25px;'>total price =</td>";
        echo "<td style='font-size: 25px;'>$totalprice $</td>";
        echo "</tr>";
    }catch (Exception $er){}


    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

?>
</body>
</html>

