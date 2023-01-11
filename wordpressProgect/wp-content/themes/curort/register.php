<?php
/*
Template Name: Register
*/
session_start();
if ($_SESSION['user']) {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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
                                <a href="/login" class="btn_login"><h3>Вход</h3></a>
                            </li>
                            <li>
                                <a href="/register" class="btn_reg"><h3 class=active>Регистрация</h3></a>
                            </li>';
                        } else
                            echo '<li><a href="#" class="user"><img width="21px" height="21px" src="../img/user4.png" /><h3>' . $_SESSION['user'] . '</h3></a></li>
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
                        <form method='post' action="/signUp">
                            <h1>Регистрация</h1>
                            <input type="text" placeholder="Фамилия" name="LastName" id="LastName" require />
                            <input type="text" placeholder="Имя" name="FirstName" id="FirstName" require />
                            <input type="text" placeholder="Отчество" name="MiddleName" id="MiddleName" require />
                            <input type="email" placeholder="E-mail" name="email" id="email" require />
                            <input type="text" placeholder="Телефон" name="phone" id="phone" require />
                            <input type='date' placeholder="Дата рождения" name="date" id="date" require />
                            <input type='password' placeholder="Пароль" name="psw" id="psw" require />
                            <input type='password' placeholder="Подтвердите пароль" name="pswTwo" id="pswTwo" require />
                            <div class="error">
                                <?php if ($_SESSION['RegErr']) {
                                    echo '<p>' . $_SESSION['RegErr'] . '</p>';
                                    unset($_SESSION['RegErr']);
                                }
                                ?>
                            </div>
                            <button type="submit">Зарегестрироваться</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <?php wp_footer(); ?>
</body>

</html>