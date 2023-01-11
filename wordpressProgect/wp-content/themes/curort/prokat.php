<?php
/*
Template Name: Prokat
*/
session_start();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Горнолыжный комплекс Эверест</title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header prokat">
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
                                <h3 class='active'>Прокат</h3>
                            </a>
                        </li>
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
                                echo ' <div class="call">
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
            <div class="banner_text prokat">
                <h1>Прокат горнолыжного инвентаря, по низким ценнам</h1>
            </div>
        </div>
    </header>
    <section class="inventar">
        <div class="container">
            <div class="all_inventar">
                <h1>Все оборудование</h1>
                <div class="type_sky">
                    <h2>Лыжи</h2>
                    <div class="cards_sky">
                        <?php
                        // require_once '../backend/connect.php';
                        // $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                        $querys = $wpdb->get_results("SELECT * FROM inventarSki");
                        // $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                        if ($querys) {
                            foreach ($querys as $query) {
                                echo '<div class="sky">
                            <div class="top_card">
                                <h2>' . $query->title . '</h2>
                            </div>

                            <div class="card_text">
                                <div class="left">
                                    <img src=http://wordpressprogect:8080/wp-content/themes/curort/assets/' . substr($query->imgUrl, 3) . ' alt="" />
                                </div>
                                <div class="right">
                                    <h2>' . $query->name . '</h2>
                                    <p>' . $query->description . '</p>
                                    <h2 style="margin-top: 155px">от ' . $query->salePrice . ' руб / день</h2>
                                    <h3>' . $query->price . ' руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="http://wordpressprogect:8080/wp-content/themes/curort/assets/img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="type_sky">
                    <h2>Сноуборды</h2>
                    <div class="cards_sky">
                        <?php
                        $querys = $wpdb->get_results("SELECT * FROM inventarBord");
                        if ($querys) {
                            foreach ($querys as $query) {
                                echo '<div class="sky">
                            <div class="top_card">
                                <h2>' . $query->title . '</h2>
                            </div>

                            <div class="card_text">
                                <div class="left">
                                <img src=http://wordpressprogect:8080/wp-content/themes/curort/assets/' . substr($query->imgUrl, 3) . ' alt="" />
                                </div>
                                <div class="right">
                                    <h2>' . $query->name . '</h2>
                                    <p>' . $query->description . '</p>
                                    <h2 style="margin-top: 155px">от ' . $query->salePrice . ' руб / день</h2>
                                    <h3>' . $query->price . ' руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="http://wordpressprogect:8080/wp-content/themes/curort/assets/img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php wp_footer(); ?>
</body>

</html>