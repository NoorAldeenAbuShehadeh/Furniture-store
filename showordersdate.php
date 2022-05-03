<?php
session_start();
if(isset($_SESSION['validmem']) && isset($_SESSION['level'])){
    if($_SESSION['validmem']==1 && $_SESSION['level']=='M'){

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

<form action="showordersdate.php" method="post">
    <p style="margin-top: 50px; margin-left: 10px; ">Enter the date: <input type="date" name="datepr">
        <input type="submit" value="show all">
    </p>
</form>
<?php

if(isset($_POST['datepr'])){
    $orid[0]=0;
    $sizearr=0;
    $persid[0]=0;
    $nameper="";
    echo '<div class="container" style="margin-top: 30px;">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>order id</th>
            <th>customer name</th>
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
            if( $row->order_date==$_POST['datepr']){
                $orid[$sizearr]=$row->order_id;
                $persid[$sizearr]=$row->person_id;
                $sizearr++;
            }
        }

    }catch (Exception $e){}
        $conn->close();
for($q=0;$q<$sizearr;$q++){
    try{
        $arr[0]=0;
        $count=0;
        $conn = new mysqli('localhost','root','','projectwp');
        $qrstr="select * from order_product";
        $res=$conn->query($qrstr);
        for($i=0;$i<$res->num_rows;$i++) {
            $row=$res->fetch_object();
            if($row->order_id==$orid[$q]){
                $arr[$count]=$row->product_id;
                $count++;
            }
        }
        $qrstr="select * from person";
        $res=$conn->query($qrstr);
        for($i=0;$i<$res->num_rows;$i++) {
            $row=$res->fetch_object();
            if($row->ID==$persid[$q]){
                $nameper=$row->Name;
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
                    echo "<td >$orid[$q]</td>";
                    echo "<td >$nameper</td>";
                    echo "<td class='row-data' >$row->ID</td>";
                    echo "<td >$row->Type</td>";
                    echo "<td>$row->new_price</td>";
                    echo "<td>$row->Properties</td>";
                    echo "<td><img src='".$row->image_url."' alt='' style='width: 200px; height: 150px;'></td>";
                    echo "</tr>";
                }
            }
            $conn->close();
        }
    }catch (Exception $er){}
}

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

?>
</body>
</html>

