<?php

// Запускаем сессии
session_start();

// Подключаем файл настроек
require_once( $_SERVER['DOCUMENT_ROOT'].'/config.php');

// Подключаем файл функций
require_once( $_SERVER['DOCUMENT_ROOT'].'/functions.php');

// блок выхода админа
if( $_GET['do'] == 'exit' ) {
    unset($_SESSION['admin']);
    session_destroy();
    header('location: '.$_SERVER['PHP_SELF']);
    exit;
}

// блок авторизации админа
if( isset($_POST['login-submit']) ) {
    if(
        trim( $_POST['login-name'] ) == ADMIN &&
        trim( md5( $_POST['login-pass'] ) ) == PASS
    )
    {
        $_SESSION['admin'] = ADMIN;
        header('location: '.$_SERVER['PHP_SELF']);
        exit;
    }
    else
    {
        $_SESSION['error'] = "<p>Неверный логин или пароль</p>";
        header('location: '.$_SERVER['PHP_SELF']);
        exit;
    }
}

// заносим во $view данные с $_GET['view']
$view = ( empty($_GET['view']) ) ? 'index' : trim( $_GET['view'] ) ;

// index
// blog
// secrets ...

// Переключатель страниц
switch($view) {
    // Главная страница
    case 'index':
        // Получаем последние секреты для главной страницы
        $secrets_home = get_home_secrets(2);

        // Добавление секрета на главной
        if( isset( $_POST['secret__btn'] ) ) {
            $secret_name   = clear_data( $_POST['secret__name'] ) ;
            $secret_mail   = clear_data( $_POST['secret__mail'] );
            $secret_text   = clear_data( $_POST['secret__text'] ) ;
            $secret_anonim = $_POST['secret__anonim'] ;

            // Добавляем в секрет
            add_secret($secret_name, $secret_mail, $secret_text, $secret_anonim);
        } // end

        // Удаляем секреты на главной
        // Удаляем секрет
        if( isset( $_GET['delete-secret'] ) ) {
            // Получаем ид секрета
            $delete_secret = (int) $_GET['delete-secret'];
            // Удаляем
            delete_secret($delete_secret);
        }

        break;
    // Страница блога
    case 'blog':
        // Получаем данные с пагинации ?page
        $pager = (int) $_GET['pager'];
        // Получаем записи блога
        $articles = get_articles($pager);
        // Подсчитываем количество элементов в массиве
        $count_articles = count_articles();
        // Лимит вывода записей на страницу
        $limit_articles = 7;
        // Получаем blog-detail записи
        $blog_detail = $_GET['blog-detail'];
        // Получаем данные о записи блога
        $article = get_article($blog_detail);

        $article['views']++;

        // Добавление в блог
        if( isset($_POST['blog-btn']) ) {
            $blog_title       = clear_data( $_POST['blog-title'] );
            $blog_title_url   = clear_data( $_POST['blog-title-url'] );
            $blog_image       = clear_data( $_FILES['blog-image'] );
            $blog_description = trim( $_POST['blog-description'] );
            $blog_text        = trim( $_POST['blog-text'] );
            $blog_meta_d      = clear_data( $_POST['blog-meta-d'] );
            $blog_meta_k      = clear_data( $_POST['blog-meta-k'] );

            // Добавляем
            add_blog($blog_title, $blog_title_url, $blog_image, $blog_description, $blog_text, $blog_meta_d, $blog_meta_k);
        }

        // Проверка существования $_GET['delete']
        if( isset($_GET['delete-blog']) ) {
            // Получаем ид записи блога
            $blog_delete = (int) $_GET['delete-blog'];
            // Удаляем запись
            delete_blog($blog_delete);
        }



        break;
    // Страница блога
    case 'blog-detail':
        //
        break;
    // Страница секретов
    case 'secrets':
        // получаем все секреты
        $secrets = get_secrets();

        // Добавление секрета на главной
        if( isset( $_POST['secret__btn'] ) ) {
            $secret_name   = clear_data( $_POST['secret__name'] ) ;
            $secret_mail   = clear_data( $_POST['secret__mail'] );
            $secret_text   = clear_data( $_POST['secret__text'] ) ;
            $secret_anonim = $_POST['secret__anonim'] ;

            // Добавляем в секрет
            $result_add_secret = add_secret($secret_name, $secret_mail, $secret_text, $secret_anonim);
        }

        // Удаляем секрет
        if( isset( $_GET['delete-secret'] ) ) {
            // Получаем ид секрета
            $delete_secret = (int) $_GET['delete-secret'];
            // Удаляем
            delete_secret($delete_secret);
        }

        break;
    case 'competitions':
        //
        break;
    case 'guestbook':
        // Получаем записи портфолио
        $guestbook_items = get_guestbook();

        // Добавление в гостевую книгу
        if( isset( $_POST['guestbook__btn'] ) ) {
            $guestbook_name    = clear_data( $_POST['guestbook__name'] ) ;
            $guestbook_mail    = clear_data( $_POST['guestbook__mail'] );
            $guestbook_text    = clear_data( $_POST['guestbook__text'] ) ;
            $guestbook_norobot = clear_data( $_POST['guestbook__no-robot'] ) ;

            // Добавляем в секрет
            $result_add_gb = add_guestbook($guestbook_name, $guestbook_mail, $guestbook_text, $guestbook_norobot);
        } // end
        break;
    case 'about':
        //
        break;
    case 'direkt':
        //
        break;
    case 'contacts':
        //
        break;
    case 'regulations':
        //
        break;
}


// Подключаем базовый шаблон
require_once( $_SERVER['DOCUMENT_ROOT'].'/view/layouts/base.php');

?>