<?php
session_start();
if (!isset($_POST['lgid']) || !isset($_POST['psd'])) {
    header('Location:index.php?err=208');
    die();
} else {
    require 'library.php';
    $user = $_POST['lgid'];
    $password = $_POST['psd'];
    isInputOk($user);
    $psd = isUserExist($user);
    if (!$psd) {
        header('Location:index.php?err=502');
        die('');
    }
    if ($psd['password'] == $password) {
        $_SESSION['logid'] = $psd['id'];
        header('Location:dashboard.php');
        die();
    } else {
        header('Location:index.php?err=502');
        die('');
    }
}
?>