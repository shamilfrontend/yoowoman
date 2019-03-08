<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <title>Заголовок страницы</title>

    <link rel="stylesheet" href="static/libs/fancybox/jquery.fancybox.css"/>
    <link rel="stylesheet" href="static/css/style.min.css"/>

</head>
<body>

<main>
    <div class="wrapper">
        <div class="all">

            <div class="page-header">
                <div class="header-top">
                    <div class="container">
                        <ul class="header-top-menu">
                            <li class="header-top-menu__item">
                                <a href="index.php?view=about" class="header-top-menu__link">О сайте</a>
                            </li>
                            <li class="header-top-menu__item">
                                <a href="index.php?view=direkt" class="header-top-menu__link">Реклама на сайте</a>
                            </li>
                            <li class="header-top-menu__item">
                                <a href="index.php?view=contacts" class="header-top-menu__link">Контакты</a>
                            </li>
                            <li class="header-top-menu__item">
                                <a href="index.php?view=regulations" class="header-top-menu__link">Регламент</a>
                            </li>
                        </ul>
                        <ul class="header-top-social">
                            <li>
                                <a href="#" title="" class="vk">
                                    <i class="fa fa-vk"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="" class="facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="" class="youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="" class="twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-middle">
                    <div class="container">
                        <div class="header-middle-logo">
                            <a href="index.php">
                                <span class="header-middle-logo__left">YOO</span><span class="header-middle-logo__right">woman</span>
                            </a>
                        </div>
                        <div class="header-middle-banner">
                            <a href="">
                                <img src="static/img/banner-top.png" alt="a">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container">
                        <ul class="header-bottom-menu">
                            <li class="header-bottom-menu__item">
                                <a href="index.php?view=index" class="header-bottom-menu__link">ГЛАВНАЯ</a>
                            </li>
                            <li class="header-bottom-menu__item">
                                <a href="index.php?view=blog" class="header-bottom-menu__link">БЛОГ</a>
                            </li>
                            <li class="header-bottom-menu__item">
                                <a href="index.php?view=secrets" class="header-bottom-menu__link">откровения</a>
                            </li>
                            <li class="header-bottom-menu__item">
                                <a href="index.php?view=competitions" class="header-bottom-menu__link">Конкурс красоты</a>
                            </li>
                            <li class="header-bottom-menu__item">
                                <a href="index.php?view=guestbook" class="header-bottom-menu__link">ГОСТЕВАЯ книга</a>
                            </li>
                        </ul>

                        <ul class="login-menu">
                            <?php
                            if( isset( $_SESSION['admin'] ) ) {
                                ?>

                                <li class="login-menu__item">
                                    Приветствую, Администратор! &nbsp;
                                </li>
                                <li class="login-menu__item">
                                    <a href='?do=exit'>
                                        <i class="fa fa-sign-out"></i>Выход
                                    </a>
                                </li>

                            <?php
                            }
                            else {

                            ?>

                                <li class="login-menu__item">
                                    <a href="#modal-login" class="fancybox">
                                        <i class="fa fa-sign-in"></i>Авторизация
                                    </a>
                                </li>

                            <?php
                            }
                            ?>
                        </ul>

                    </div>
                </div>
            </div>

            <?php
            // Подключаем страницы
            require_once( $_SERVER['DOCUMENT_ROOT'].'/view/pages/'.$view.'.php');
            ?>



        </div>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <a href="http://alisultanov.ru/" target="_blank" class="made-site">
            <?=COPYRIGHT ?>
        </a>
    </div>
</footer>

<div class="hidden">
    <div id="modal-login" class="modal-login">
        <h3 class="modal-login__title">Авторизация</h3>
        <form method="post">
            <input type="text" placeholder="Логин" name="login-name">
            <input type="password" placeholder="Пароль" name="login-pass">
            <button name="login-submit">Войти</button>
        </form>
    </div>
</div>







<script src="static/js/jquery.min.js"></script>
<script src="static/libs/fancybox/jquery.fancybox.js"></script>
<script src="static/libs/formstyler/jquery.formstyler.min.js"></script>

<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>

<script src="static/libs/owl-carousel/owl.carousel.min.js"></script>
<script src="static/libs/liTranslit/js/jquery.liTranslit.js"></script>

<script src="static/js/main.js"></script>


</body>
</html>