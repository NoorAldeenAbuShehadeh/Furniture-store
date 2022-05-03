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

    <link rel="stylesheet" href="style-main.css">

</head>
<body>
<!--       -->
<header class="header" id="top">

    <div class="header-2" >
        <nav class="navbar">
            <a href="Login.php" id="login-btn" class="fas fa-user" style="alignment: right"></a>
            <a href="#top">home</a>
            <a href="#contact">contact</a>
        </nav>
    </div>

</header>



<!--                         new material           -->

<section class="home" >

    <div class="slides-container">

        <div class="slide active">
            <div class="content">
                <h3>chair</h3>


            </div>
            <div class="image">
                <img src="image/chair2.png" alt="">
            </div>

        </div>

        <div class="slide">
            <div class="content">
                <h3>sofa set</h3>


            </div>
            <div class="image">
                <img src="image/sofa4.png" alt="">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <h3>portable bed
                </h3>

            </div>
            <div class="image">
                <img src="image/sofa7.png" alt="">
            </div>
        </div>



        <div class="slide">
            <div class="content">
                <h3>flexible chair
                </h3>

            </div>
            <div class="image">
                <img src="image/chair11.png" alt="">
            </div>
        </div>


        <div class="slide">
            <div class="content">
                <h3>Bedroom
                </h3>

            </div>
            <div class="image">
                <img src="image/broom.png" alt="">
            </div>
        </div>

    </div>

    <div id="slide-next" onclick="next()" class="fas fa-angle-right"></div>
    <div id="slide-prev" onclick="prev()" class="fas fa-angle-left"></div>

</section>

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


<div class="loader-container">
    <img src="image/loader-img.gif" alt="">
</div>


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="mainjs.js"></script>