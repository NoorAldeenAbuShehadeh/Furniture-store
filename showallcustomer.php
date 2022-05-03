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
    <title>show all customer</title>
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
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>gmail</th>
            <th>Address</th>
            <th>phone_number</th>
        </tr>
        </thead>

        <tbody>
        <?php
        try{
            $conn = new mysqli('localhost','root','','projectwp');
            $qrstr="select * from person";
            $res=$conn->query($qrstr);
            for($i=0;$i<$res->num_rows;$i++) {
                $row=$res->fetch_object();
                if($row->level=='C'){
                echo "<tr>";
                echo "<td>$row->ID</td>";
                echo "<td>$row->Name</td>";
                echo "<td>$row->gmail</td>";
                echo "<td>$row->Address</td>";
                echo "<td>$row->phone_number</td>";
                echo "</tr>";
                }
            }
            $conn->close();
        }catch (Exception $e){

        }

        ?>
        </tbody>
    </table>
</div>

</body>
</html>
