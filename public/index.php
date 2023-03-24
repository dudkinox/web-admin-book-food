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
                    case '0':
                        # code...
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

    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
</body>

</html>