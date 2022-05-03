<?php
session_start();
if(isset($_SESSION['validmem']) && isset($_SESSION['level'])) {
    if ($_SESSION['validmem'] == 1 && $_SESSION['level'] == 'M') {
        if (isset($_GET['x'])) {
            $_SESSION['prodid'] = $_GET['x'];
            try {
                $conn = new mysqli('localhost', 'root', '', 'projectwp');
                $qrstr = "DELETE FROM product WHERE ID=" . $_SESSION['prodid'] . ";";
                $res = $conn->query($qrstr);
                if ($res == 1) {
                    header('location:Home.php');
                } else {
                    echo '<script>alert("some data entered is wrong") </script>';
                }
                $conn->commit();
                $conn->close();
            } catch (Exception $e) {

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
