<?php
/*
Template Name: Authorization
*/
session_start();
global $wpdb;
$email = $_POST['email'];
$password = $_POST['psw'];
$password = md5($password . 'oius78fy8789gs9df87ysbdf887ys987fn98gf');
$query = $wpdb->get_row("SELECT * FROM user WHERE Email = '$email' AND Password = '$password'");


if (count($query) == 0) {
    $_SESSION['message'] = "Неверно введен логин или пароль";
    echo 'Неверно введен логин или пароль';
    header('Location: /login');
} else {
    echo "Вход выполнен успешно";
    $_SESSION['user'] = $query;
    header('Location: /');
}
?>