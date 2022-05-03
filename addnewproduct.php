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

<body >

<div class="container w-50 p-3 " >
    <form action="uploadimg.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-25">
                <label for="type">Type: </label>
            </div>
            <div class="col-75">
                <select size="1" id="mySelect" style="color:black;" name="typea">
                                    <option value="Featured" selected>Featured</option>
                                    <option value="Sofas">Sofas</option>
                                    <option value="Bedroom">Bedroom</option>
                                    <option value="Table">Table</option>
                                    <option value="Armoires">Armoires</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Old price">Old price: </label>
            </div>
            <div class="col-75">
                <input type="text" name="oldprice" >
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="new price">new price:</label>
            </div>
            <div class="col-75">
                <input type="text" name="newprice" >
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="Properties">Properties: </label>
            </div>
            <div class="col-75">
                <textarea name="Properties" style="width: 300px; height: 100px; "></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="img">IMAGE: </label>
            </div>
            <div class="col-75">
                <div class="drop-zone">
                    <span class="drop-zone__prompt" >Drop image here</span>
                    <input type="file" name="imageadd" class="drop-zone__input" style="width: 300px;">

                </div>
            </div>
        </div>

        <div class="row">
            <input type="submit" value="ADD PRODUCT">
        </div>
    </form>
</div>
<script src="jsimg.js"></script>

</body>