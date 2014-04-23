<?php
if (!isset($_POST['lgid'])) {
    header('Location:index.php?err=208');
} else {
    require 'library.php';
    if(saveInUser($_POST)){
        header('location:index.php?cd=500');
    }else{
        header('location:signup.php?err=501');
    }
}
?>