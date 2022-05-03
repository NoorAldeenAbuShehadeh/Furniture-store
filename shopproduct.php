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
if(isset($_GET['id'])) {
$_SESSION['idforp']=$_GET['id'];
    $date = date("Y-m-d");
    $ii = 0;
    $jj = 0;
    $orderid = 0;
    try {
        $conn = new mysqli('localhost', 'root', '', 'projectwp');
        $qrstr = "select * from product";
        $res = $conn->query($qrstr);
        for ($i = 0; $i < $res->num_rows; $i++) {
            $row = $res->fetch_object();
            if ($row->ID == $_SESSION['idforp']) {
                $ii = 1;
            }
        }
        $conn->close();
    } catch (Exception $ex) {
    }

    try {
        $conn = new mysqli('localhost', 'root', '', 'projectwp');
        $qrstr = "select * from orders";
        $res = $conn->query($qrstr);
        for ($i = 0; $i < $res->num_rows; $i++) {
            $row = $res->fetch_object();
            if ($row->order_date == $date && $row->person_id==$_SESSION['personid']) {
                $jj = 1;
                $orderid=$row->order_id;
            }
        }
        $conn->close();
    } catch (Exception $ex) {
    }

    if($ii==1 && $jj==1){
        try {
            $conn = new mysqli('localhost', 'root', '', 'projectwp');
            $qrstr = "INSERT INTO `order_product` (`inct`, `order_id`, `product_id`) VALUES (NULL, '".$orderid."', '".$_SESSION['idforp']."');";
            $res = $conn->query($qrstr);
            $conn->commit();
            $conn->close();
        } catch (Exception $ex) {
        }
    }
    elseif ($ii==1 && $jj==0){
        try {

            $contr = new mysqli('localhost', 'root', '', 'projectwp');
            $newstr="INSERT INTO `orders` (`order_id`, `person_id`, `order_date`) VALUES (NULL, '".$_SESSION['personid']."', '".$date."');";
            $res = $contr->query($newstr);
            $contr->commit();
            $contr->close();

            $conn = new mysqli('localhost', 'root', '', 'projectwp');
            $str="select * from orders";
            $res = $conn->query($str);
            for ($i = 0; $i < $res->num_rows; $i++) {
                $row = $res->fetch_object();
                if ($row->order_date == $date && $row->person_id==$_SESSION['personid']) {
                    $orderid=$row->order_id;
                }
            }
            $qrstr = "INSERT INTO `order_product` (`inct`, `order_id`, `product_id`) VALUES (NULL, '".$orderid."', '".$_SESSION['idforp']."');";
            $res = $conn->query($qrstr);
            $conn->commit();
            $conn->close();
        } catch (Exception $ex) {
        }

    }
    else{
        echo "<script>alert('There are some error')</script>";
        echo "<script>location.href='Home.php'</script>";
    }
    echo "<script>alert('Done success')</script>";
    echo "<script>location.href='Home.php'</script>";
}
?>