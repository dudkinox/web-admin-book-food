<?php
session_start();

$page = isset($_GET["page"]) ? $_GET["page"] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/head.php'; ?>
</head>

<body>
    <script src="assets/js/initTheme.js"></script>

    <?php if (isset($_SESSION["login"])) { ?>
    <div id="app">
        <?php include 'components/menu-pages.php'; ?>
        <div id="main">
            <?php
                include 'components/header.php';
                switch ($page) {
                    case 'จัดการโต๊ะ':
                        include 'pages/table.php';
                        break;
                    case 'จัดการเมนูอาหาร':
                        include 'pages/manage-food.php';
                        break;
                    case 'การชำระเงิน':
                        include 'pages/payment.php';
                        break;
                    default:
                        include 'pages/customer.php';
                        break;
                }
                include 'components/footer.php';

                ?>

        </div>
    </div>
    <?php } else { ?>
    <?php include 'pages/login.php'; ?>
    <?php } ?>

    <?php include 'components/script.php'; ?>
</body>

</html>