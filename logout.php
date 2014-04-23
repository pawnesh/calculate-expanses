<?php

session_start();
if (session_destroy()) {
    echo 'sesstion destroy';
} else {
    echo 'session not destroy';
}
header('location:index.php?cd=210');
