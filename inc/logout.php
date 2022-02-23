<?php
session_start();

$_SESSION['user_id'] = null;
$_SESSION['user_first'] = null;
$_SESSION['user_last'] = null;
$_SESSION['user_email'] = null;
$_SESSION['user_phone'] = null;
$_SESSION['user_phone_code'] = null;
$_SESSION['user_role'] = null;

header("Location: ../login.php");