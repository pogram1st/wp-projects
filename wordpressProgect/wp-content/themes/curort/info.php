<?php
/*
Template Name: Info
*/
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Горнолыжный комплекс Эверест</title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header info">
        <div class="container">
            <div class="header_info">
                <div class="logo_header">
                    <a href="/"><?php the_custom_logo(); ?></a>
                    <a href="/">
                        <h2><?php the_field('logo_text', 7); ?></h2>
                    </a>
                </div>
                <div class="header_menu">
                    <ul>
                        <li>
                            <a href="/prokat">
                                <h3>Прокат</h3>
                            </a>
                        </li>
                        <li>
                            <a href="/hotel">
                                <h3>Отель</h3>
                            </a>
                        </li>
                        <li>
                            <a href="/info">
                                <h3 class="active">Информация</h3>
                            </a>
                        </li>
                        <?php if (!$_SESSION['user']) {
                            echo '
                            <li>
                                <a href="/login" class="btn_login"><h3>Вход</h3></a>
                            </li>
                            <li>
                                <a href="/register" class="btn_reg"><h3>Регистрация</h3></a>
                            </li>';
                        } else {
                            if ($_SESSION['user']->type == 1) {
                                echo '
                           <li>
                                <a href="/orders"><h3>Бронь</h3></a>
                            </li>';
                            }
                            echo '<li><a href="#" class="user"><img width="21px" height="21px" src="http://wordpressprogect:8080/wp-content/themes/curort//assets/img/user4.png" /><h3>
                            ' . $_SESSION['user']->FirstName . '</h3></a></li>
                          <li ><a href="#" onclick="logout()" class="logout"><h3>Выход</h3></a></li>
                          ';
                        }
                        ?>

                        <!-- <li>
                            <?php
                            if (!$_SESSION['user']) {
                                echo '<div class="call">
                                    <img width="19px" height="19px" src="http://wordpressprogect:8080/wp-content/themes/curort//assets/img/call.png" alt="" />
                                    <a href="tel:79999999999">
                                        <h3>+7 (999)-999-9999</h3>
                                    </a>
                                </div>';
                            }
                            ?>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="banner_text">
                <h1><?php the_field('banner_text_prokat_top'); ?></h1>
                <h3><?php the_field('banner_text_prokat_bottom'); ?></h3>
            </div>
        </div>
    </header>
    <section class="information">
        <div class="container">
            <div class="info_block">
            </div>
        </div>
    </section>
    <?php wp_footer(); ?>
</body>

</html>