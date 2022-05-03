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
<html>
<head>
    <title>Uploading image</title>
</head>
<body>
<h1>Uploading file</h1>
<?php
if ($_FILES['imageadd']['error'] > 0)
{
    echo 'Problem: ';
    switch ($_FILES['imageadd']['error'])
    {
        case 1: echo 'File exceeded upload_max_filesize';
            break;
        case 2: echo 'File exceeded max_file_size';
            break;
        case 3: echo 'File only partially uploaded';
            break;
        case 4: echo 'No file uploaded';
            break;
        case 6: echo 'Cannot upload file: No temp directory specified';
            break;
        case 7: echo 'Upload failed: Cannot write to disk';
            break;
    }
    exit;
}
if ($_FILES['imageadd']['type'] != 'image/jpeg' && $_FILES['imageadd']['type'] != 'image/png' && $_FILES['imageadd']['type'] != 'image/jpg')
{
    echo 'Problem: file is not plain image';
    exit;
}
$upfile = 'C:\xampp\htdocs\main_pro\imageuploads/'.$_FILES['imageadd']['name'] ;
if (is_uploaded_file($_FILES['imageadd']['tmp_name']))
{
    if (!move_uploaded_file($_FILES['imageadd']['tmp_name'], $upfile))
    {
        echo 'Problem: Could not move file to destination directory';
        exit;
    }
}
else
{
    echo 'Problem: Possible file upload attack. Filename: ';
    echo $_FILES['imageadd']['name'];
    exit;
}
echo '<script> alert("File uploaded successfully"); </script>';
$file1 = basename($upfile);
$urlimg='imageuploads/'.$file1;
if(isset($_POST['typea']) && isset($_POST['oldprice']) && isset($_POST['newprice']) && isset($_POST['Properties'])){
    try {
        $conn = new mysqli('localhost', 'root', '', 'projectwp');
        $qrstr = "INSERT INTO `product` (`ID`, `Properties`, `Type`, `old_price`, `new_price`, `image_url`) VALUES (NULL, '".$_POST['Properties']."', '".$_POST['typea']."', '".$_POST['oldprice']."', '".$_POST['newprice']."', '".$urlimg."');";
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
</body>
</html>
