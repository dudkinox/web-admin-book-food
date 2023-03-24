<?php
session_start();

$pass = $_POST["password"];

if ($pass == "kyp007") {
    $_SESSION["login"] = true;
}
header("Location: ../../");
