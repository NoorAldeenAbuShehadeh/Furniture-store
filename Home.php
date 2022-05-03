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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        FURNITURE N&M Company
    </title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">


</head>
<body>
<!--       -->

<header class="header" id="top">
    <div class="header-1">
        <a href="Home.php" class="logo"> <i class="fas fa-store"></i> FURNITUER </a>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="#featured">featured</a>
            <a href="#sofas">sofas</a>
            <a href="#bedroom">bedrooms</a>
            <a href="#tables">tables</a>
            <a href="#Armoires">Armoires</a>
            <a href="change_information.php">information</a>
            <a href="#contact">contact</a>
            <?php
            if($_SESSION['level']=='M'){
                echo '<a href="addnewproduct.php">add product</a>';
                echo '<a href="showallproducts.php">products</a>';
                echo '<a href="showallcustomer.php">show all customer</a>';
                echo '<a href="showordersdate.php">orders</a>';
            }
            if($_SESSION['level']=='C'){
                echo '<a href="Bill_saling.php">show bill</a>';
            }
            ?>
            <a href="Sign_out.php">Sign out</a>

        </nav>
    </div>

</header>



<!-- Featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"> <span>featured furniture</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            <?php
            try {
                $dp=new mysqli('localhost','root','','projectwp');
                $qrstr="select * from product";
                $res=$dp->query($qrstr);
                for($i=0;$i<$res->num_rows;$i++) {
                    $row=$res->fetch_object();
                    if($row->Type=="Featured"){
                        echo "<div class='swiper-slide box'>";
                        echo "<div class='image'>";
                        echo "<img src=$row->image_url alt=''  >";
                        echo "</div>";
                        echo "<div class='content'>";
                        echo "<div class='price'> $row->new_price$  <span>$row->old_price$</span></div>";
                        echo "<a href='shopproduct.php?id=$row->ID' class='btn' ;>buy this product</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                $dp->close();
            }catch (Exception $e){

            }
            ?>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>





<!--         sofas         -->

<section class="featured" id="sofas">

    <h1 class="heading"> <span>sofa furniture</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            <?php
            try {
                $dp=new mysqli('localhost','root','','projectwp');
                $qrstr="select * from product";
                $res=$dp->query($qrstr);
                for($i=0;$i<$res->num_rows;$i++) {
                    $row=$res->fetch_object();
                    if($row->Type=="Sofas"){
                        echo "<div class='swiper-slide box'>";
                        echo "<div class='image'>";
                        echo "<img src=$row->image_url alt='' >";
                        echo "</div>";
                        echo "<div class='content'>";
                        echo "<div class='price'> $row->new_price$  <span>$row->old_price$</span></div>";
                        echo "<a href='shopproduct.php?id=$row->ID' class='btn' ;>buy this product</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                $dp->close();
            }catch (Exception $e){

            }
            ?>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!--              Bedroom          -->

<section class="featured" id="bedroom">

    <h1 class="heading"> <span>bedroom furniture</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">
            <?php
            try {
                $dp=new mysqli('localhost','root','','projectwp');
                $qrstr="select * from product";
                $res=$dp->query($qrstr);
                for($i=0;$i<$res->num_rows;$i++) {
                    $row=$res->fetch_object();
                    if($row->Type=="Bedroom"){
                        echo "<div class='swiper-slide box'>";
                        echo "<div class='image'>";
                        echo "<img src= $row->image_url  alt=''  >";
                        echo "</div>";
                        echo "<div class='content'>";
                        echo "<div class='price'> $row->new_price$  <span>$row->old_price$</span></div>";
                        echo "<a href='shopproduct.php?id=$row->ID' class='btn ' ;>buy this product</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                $dp->close();
            }catch (Exception $e){

            }
            ?>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>


<!--         ---------------------- Table ----------------------            -->


<section class="featured" id="tables">

    <h1 class="heading"> <span>table furniture</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            <?php
            try {
                $dp=new mysqli('localhost','root','','projectwp');
                $qrstr="select * from product";
                $res=$dp->query($qrstr);
                for($i=0;$i<$res->num_rows;$i++) {
                    $row=$res->fetch_object();
                    if($row->Type=="Table"){
                        echo "<div class='swiper-slide box'>";
                        echo "<div class='image'>";
                        echo "<img src= $row->image_url  alt=''  >";
                        echo "</div>";
                        echo "<div class='content'>";
                        echo "<div class='price'> $row->new_price$  <span>$row->old_price$</span></div>";
                        echo "<a href='shopproduct.php?id=$row->ID' class='btn ';>buy this product</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                $dp->close();
            }catch (Exception $e){

            }
            ?>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>



<!-----------------------    Armoires  ------------------------------>



<section class="featured" id="Armoires">

    <h1 class="heading"> <span>Armoires furniture</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            <?php
            try {
                $dp=new mysqli('localhost','root','','projectwp');
                $qrstr="select * from product";
                $res=$dp->query($qrstr);
                for($i=0;$i<$res->num_rows;$i++) {
                    $row=$res->fetch_object();
                    if($row->Type=="Armoires"){
                        echo "<div class='swiper-slide box'>";
                        echo "<div class='image'>";
                        echo "<img src= $row->image_url  alt=''  >";
                        echo "</div>";
                        echo "<div class='content'>";
                        echo "<div class='price'> $row->new_price$  <span>$row->old_price$</span></div>";
                        echo "<a href='shopproduct.php?id=$row->ID' class='btn';>buy this product</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                $dp->close();
            }catch (Exception $e){

            }
            ?>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>


<!--            -->

<section class="footer" id="contact">

    <div class="box-container">

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +972 598952644 </a>
            <a href="#"> <i class="fas fa-phone"></i> +972 597356188 </a>
            <a href="mailto:anooraldeen9@gmail.com" style="text-transform: lowercase"> <i class="fas fa-envelope"></i> anooraldeen9@gmail.com </a>

        </div>

    </div>

    <div class="share">
        <a href="https://ar-ar.facebook.com/pages/category/Mattress-Manufacturer/%D8%A7%D8%A8%D9%88%D8%B4%D8%AD%D8%A7%D8%AF%D8%A9-%D9%84%D9%84%D9%85%D9%81%D8%B1%D9%88%D8%B4%D8%A7%D8%AA-1660361480892908/" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>

    </div>

</section>



<!-- loader  -->

<div class="loader-container">
    <img src="image/loader-img.gif" alt="">
</div>


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>