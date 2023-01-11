<?php
/*
Template Name: logout
*/
session_start();
unset($_SESSION['user']);
header('Location: /login')
    ?>