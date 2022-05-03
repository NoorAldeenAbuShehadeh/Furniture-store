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
<div class="container" style="margin-top: 30px;">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Type</th>
            <th>New Price</th>
            <th>Properties</th>
            <th>Image</th>
            <th>remove/Update product</th>
        </tr>
        </thead>

        <tbody>
        <?php
        try{
            $conn = new mysqli('localhost','root','','projectwp');
            $qrstr="select * from product";
            $res=$conn->query($qrstr);
            for($i=0;$i<$res->num_rows;$i++) {
                $row=$res->fetch_object();
                echo "<tr id='".($i+1)."'>";
                echo "<td class='row-data' >$row->ID</td>";
                echo "<td >$row->Type</td>";
                echo "<td>$row->new_price</td>";
                echo "<td>$row->Properties</td>";
                echo "<td><img src='".$row->image_url."' alt='' style='width: 200px; height: 150px;'></td>";
                echo "<td><input type='submit' value='delete' class='falldata' onclick='show();'> 
                        <input type='submit' value='update' class='editdata' onclick='showedit();'>
                            </td>";
                echo "</tr>";
            }
            $conn->close();
        }catch (Exception $e){

        }

        ?>
        <script>
                    function show() {
                    var idp;
                    var rowId = event.target.parentNode.parentNode.id;
                    var data = document.getElementById(rowId).querySelectorAll(".row-data");
                    var idp = data[0].innerHTML;
                    location.href="deleteprod.php?x="+idp+"";
                }
                    function showedit(){
                        var idp;
                        var rowId = event.target.parentNode.parentNode.id;
                        var data = document.getElementById(rowId).querySelectorAll(".row-data");
                        var idp = data[0].innerHTML;
                        location.href="editproduct.php?x="+idp+"";
                    }
        </script>
        </tbody>
    </table>
</div>


</body>
</html>
