<?php

// Читабельный вывод массива
function print_array($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


// clear_data очищаем поля
function clear_data($param) {
    $param = trim( htmlspecialchars( $param ) );
    return $param;
}


// Функция подключения к БД
function db_connect() {
    // Данные для подключения
    $db_host = "localhost";
    $db_user = "shamil";
    $db_pass = "123456";
    $db_name = "9yoowoman";

    // Подкючаемся к серверу
    $connection = mysql_connect($db_host, $db_user, $db_pass);
    // Выбираем БД
    $db = mysql_select_db($db_name);

    // Проверка подключения
    if( !$connection && !$db ) {
        return false;
    } else {
        return $connection;
    }
}


// Конвертация из результата с БД в массив
function db_result_to_array($result_db) {
    // создаем массив для вывода
    $result_array = array();
    // создаем переменную счетчика
    $count = 0;

    // Проходимся циклом по результату и заполняем массив данными
    while( $row = mysql_fetch_assoc($result_db) ) {
        $result_array[$count] = $row;
        $count++;
    }

    // Возврашаем массив
    return $result_array;
}


// Получаем секреты для главной страницы
function get_home_secrets($count) {
    // Подключаем к БД
    db_connect();
    // Очищаем данные
    $count = abs( (int) $count );
    // Составляем запрос
    $query = "SELECT * FROM secrets ORDER BY id DESC LIMIT $count";
    // Отправляем запрос
    $result_db = mysql_query($query);
    // конвертируем результат в массив
    $result_array = db_result_to_array($result_db);
    // Возврашаем массив с секретами
    return $result_array;
}


// Получаем все секреты с БД
function get_secrets() {
    // Подключаем к БД
    db_connect();
    // Составляем запрос
    $query = "SELECT * FROM secrets ORDER BY id DESC ";
    // Отправляем запрос
    $result_db = mysql_query($query);
    // конвертируем результат в массив
    $result_array = db_result_to_array($result_db);
    // Возврашаем массив с секретами
    return $result_array;
}


// Добавление секрета
function add_secret($name, $mail, $text, $user_anonim) {
    // Подключаем к БД
    db_connect();

    // Очищаем данные перед добавлением
    $name = mysql_real_escape_string($name);
    $mail = mysql_real_escape_string($mail);
    $text = mysql_real_escape_string($text);

    $user_image = 'default.jpg';

    // Проверка нажат ли чекбокс Анонимно
    if( $user_anonim == "on" ) {
        $name = 'Анонимно';
        $mail = 'anonim@mail.ru';
        $user_image = 'default.jpg';
    }

    // Составляем запрос
    $query = "INSERT INTO secrets (name, user_image, text, date, email)
              VALUES ('$name', '$user_image', '$text', CURRENT_TIMESTAMP, '$mail'); ";

    // Отправляем запрос
    $result_db = mysql_query($query);

    // Проверка добавления
    if ($result_db == true ) {
        $_SESSION['msg'] = "Ваши данные успешно добавлены";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    } else{
        $_SESSION['msg'] = "Ваши данные не добавлены";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
}

// получаем все записи гостевой книги
function get_guestbook() {
    // Подключаем к БД
    db_connect();
    // Составляем запрос
    $query = "SELECT * FROM guestbook ORDER BY id DESC ";
    // Отправляем запрос
    $result_db = mysql_query($query);
    // конвертируем результат в массив
    $result_array = db_result_to_array($result_db);
    // Возврашаем массив с секретами
    return $result_array;
}


// Добавление в гостевую книгу
function add_guestbook($name, $mail, $text, $no_robot) {
    // Подключаем к БД
    db_connect();
    // проверка на спам
    if( !($no_robot == 'on') ) {
        return false;
    }
    // Очищаем данные перед добавлением
    $name = mysql_real_escape_string($name);
    $mail = mysql_real_escape_string($mail);
    $text = mysql_real_escape_string($text);

    // Составляем запрос
    $query = "INSERT INTO guestbook (name, user_image, text, date, email)
              VALUES ('$name', 'default.jpg', '$text', CURRENT_TIMESTAMP, '$mail'); ";

    // Отправляем запрос
    $result_db = mysql_query($query);

    // Проверка добавления
    if ($result_db== 'true') {
        header("Location: index.php?view=guestbook");
//        header("Location: ".$_SERVER['PHP_SELF']);
        return "Ваши данные успешно добавлены";
    } else{
        header("Location: index.php?view=guestbook");
//        header("Location: ".$_SERVER['PHP_SELF']);
        return "Ваши данные не добавлены";
    }
}


// Получаем записи блога
function get_articles($start) {
    // Подключаем к БД
    db_connect();
    // Очищаем данные
    $start = mysql_real_escape_string($start);
    // Составляем запрос
    $query = "SELECT * FROM blog ORDER BY id DESC LIMIT $start, 7 ";
    // Отправляем запрос
    $result_db = mysql_query($query);
    // конвертируем результат в массив
    $result_array = db_result_to_array($result_db);
    // Возврашаем массив с секретами
    return $result_array;
}


// Получаем одну запись блога
function get_article($title) {
    // Подключаем к БД
    db_connect();
    // Очищаем данные
    $title = mysql_real_escape_string($title);
    // Составляем запрос
    $query = "SELECT * FROM blog WHERE blog.title_url = '$title' ";
    // Отправляем запрос
    $result_db = mysql_query($query);
    // конвертируем результат в массив
    $result_array = mysql_fetch_assoc($result_db);
    // Возврашаем массив с секретами
    return $result_array;
}


// количество записей блога в бд
function count_articles() {
    // Подключаем к БД
    db_connect();
    // Составляем запрос
    $query = "SELECT * FROM blog ";
    // Отправляем запрос
    $result_db = mysql_query($query);
    // Подсчитываем количество строк в результате
    $count_result = mysql_num_rows($result_db);
    // Возврашаем $count_result
    return $count_result;
}


// Добавление в блог
function add_blog($title, $title_url, $image, $descr, $text, $meta_d, $meta_k) {
    // Подключаем к БД
    db_connect();
    // Очищаем данные
    $title     = mysql_real_escape_string($title);
    $title_url = mysql_real_escape_string($title_url);
    $image     = mysql_real_escape_string($image);
    $descr     = mysql_real_escape_string($descr);
    $text      = mysql_real_escape_string($text);
    $meta_k    = mysql_real_escape_string($meta_d);
    $meta_k    = mysql_real_escape_string($meta_k);

    if( !empty($title) && !empty($text) ) {
        // Составляем запрос
        $query = "
        INSERT INTO blog (
          title, title_url, description, text, image, date, meta_d, meta_k
        )
        VALUES (
          '$title', '$title_url', '$descr', '$text', '$image', CURRENT_TIMESTAMP, '$meta_d', '$meta_k'
        );

         ";
        // Отправляем запрос
        $result = mysql_query($query);
        header('location: index.php?view=blog');
    } else {
        return false;
    }
}


// Удаляем статью из блога
function delete_blog($id) {
    // Подключаем к БД
    db_connect();
    // Составляем запрос
    $query = "DELETE FROM blog WHERE id = $id";
    // Отправляем запрос
    mysql_query($query);
    // Заново запращиваем страницу
    header('location: index.php?view=blog');
    exit();
}


// Удаляем секрет
function delete_secret($id) {
    // Подключаем к БД
    db_connect();
    // Составляем запрос
    $query = "DELETE FROM secrets WHERE id = $id";
    // Отправляем запрос
    mysql_query($query);
    // Заново запращиваем страницу
    header('location: index.php?view=secrets');
    exit();
}


// Проверка админа
function is_admin() {
    if( !empty($_SESSION['admin']) && $_SESSION['admin'] == ADMIN ) {
        return true;
    }
    return false;
}


// загрузка картинок
//function uploadImage($image, $ID, $path, $iterator, $size) {
//    $imgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $image['name']));
//    //$imgName = "{$iterator}_{$ID}.{$imgExt}";
//
//    $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
//    $error = "";
//
//    if (!in_array($image['type'], $types)) $error .= "<li>Допустимые расширения - .gif, .jpg, .png!</li>";
//    if ($image['size'] > SIZE) $error .= "<li>Максимальный вес файла - 1 Мб!</li>";
//    //if (empty($size[0]) || empty($size[1])) $error .= "<li>Неверные размеры изображения!</li>";
//    if ($image['error']) $error .= "<li>Ошибка при загрузке файла!</li>";
//
//    if (!empty($error)) {
//        $_SESSION['answer'] .= '<div class="alert alert-danger"><strong>Ошибка при загрузке <b>' . $imgName . '</b> картинки!</strong> <ul>' . $error . '</ul></div>';
//        return false;
//    }
//    //print_array($image);
//    $dirname = DR . $path; //echo DR; echo "<br>"; die($_SERVER['DOCUMENT_ROOT']);
//
//    if (move_uploaded_file($image['tmp_name'], DR . "/files/tmp/{$imgName}")) {
//        return true;
//    } else {
//        $_SESSION['answer'] .= '<div class="alert alert-danger"><strong>Ошибка!</strong> Не удалось переместить загруженное изображение. Проверьте права на папку в каталоге <b>' . $dirname . '</b></div>';
//    } return false;
//}


// update article


?>