<?php
/*
Template Name: Login
*/
session_start();
if ($_SESSION['user']) {
    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Вход</title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header login_head">
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
                        <!-- <li>
                            <a href="./location.php">
                                <h3>Как добраться</h3>
                            </a>
                        </li> -->
                        <li>
                            <a href="/hotel">
                                <h3>Отель</h3>
                            </a>
                        </li>
                        <li>
                            <a href="/info">
                                <h3>Информация</h3>
                            </a>
                        </li>
                        <?php if (!$_SESSION['user']) {
                            echo '
                            <li>
                                <a href="/login" class="btn_login"><h3 class=active>Вход</h3></a>
                            </li>
                            <li>
                                <a href="/register" class="btn_reg"><h3>Регистрация</h3></a>
                            </li>';
                        } else
                            echo '<li><a href="#" class="user"><img width="21px" height="21px" src="../img/user4.png" /><h3>' . $_SESSION['user']['LastName'] . '</h3></a></li>
                          <li ><a href="#" class="logout"><h3>Выход</h3></a></li>
                          ';
                        ?>

                        <!-- <li>
                            <div class="call">
                                <img width="19px" height="19px" src="../img/call.png" alt="" />
                                <a href="tel:79999999999">
                                    <h3>+7 (999)-999-9999</h3>
                                </a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
            <section class="login">
                <div class="container">
                    <div class="login_block">
                        <form action="/authorization" method="post">
                            <h1>Вход</h1>
                            <input type="text" placeholder="E-mail" name="email" id="email" />
                            <input type="password" placeholder="Password" name="psw" id="psw" />
                            <div class="error">
                                <?php if ($_SESSION['message']) {
                                    echo '<p>' . $_SESSION['message'] . '</p>';
                                    unset($_SESSION['message']);
                                }
                                ?>
                            </div>
                            <button type="submit">Войти</button>

                        </form>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <?php wp_footer(); ?>
</body>

</html>