<?php
session_start();
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
    </div>
    <?php } else { ?>
    <?php include 'page/login.php'; ?>
    <?php } ?>

    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
</body>

</html>