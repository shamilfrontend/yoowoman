<div class="main-content">
    <div class="container">

        <ul class="breadcroumbs">
            <li class="breadcroumbs__item">
                <a href="" class="breadcroumbs__link">Главная</a>
            </li>
            <li class="breadcroumbs__item">
                <span class="breadcroumbs__link">Текущая страница</span>
            </li>
        </ul>

        <div class="content-box-left">

            <?php
            // если не существует в GET blog-detail то показываем блог
            if( !isset($blog_detail) ) {
            ?>

            <h1 class="content-box-left__title">Блог</h1>

            <?php if( isset( $_SESSION['admin'] ) ): ?>
                <div class="admin-blog">

                    <h2 class="admin-blog__title">
                        <i class="fa fa-plus"></i>
                        Добавить запись
                    </h2>

                    <div class="admin-blog-add">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input name="blog-title" class="admin-blog-add__name js-blog-title" type="text" placeholder="Название статьи" required>
                            <input name="blog-title-url" class="admin-blog-add__name js-blog-title-url" type="text" placeholder="Транслит" disabled required>

                            <input name="blog-image" class="admin-blog-add__file" id="admin-blog-add__name" type="file" >
                            <label class="admin-blog-add__label" for="admin-blog-add__name">
                                <i class="fa fa-file"></i>Выбрать картинку записи
                            </label>

                            <textarea name="blog-description" class="admin-blog-add__text admin-blog-add__text--short" placeholder="Описание статьи"></textarea>
                            <textarea name="blog-text" class="admin-blog-add__text" placeholder="Полный текст статьи"></textarea>
                            <input name="blog-meta-d" class="admin-blog-add__name" type="text" placeholder="Описание страницы">
                            <input name="blog-meta-k" class="admin-blog-add__name" type="text" placeholder="Ключевые слова через запятую">
                            <button name="blog-btn" class="admin-blog-add__btn">Добавить</button>
                        </form>
                    </div>

                </div>
            <?php endif; ?>

            <ul class="blog-list">

                <?php foreach ($articles as $article): ?>
                <li class="blog-list__item">
                    <div class="blog-box">
                        <figure>
                            <a href="index.php?view=blog&blog-detail=<?=$article['title_url']?>">
                                <img src="static/media/blog/<?=$article['image']?>" class="" alt="<?=$article['title']?>">
                            </a>
                        </figure>
                        <div class="text">
                            <h4 class="blog-box__title">
                                <a href="index.php?view=blog&blog-detail=<?=$article['title_url']?>">
                                    <?=$article['title']?>
                                </a>
                            </h4>
                            <ul class="blog-box__date">
                                <li>
                                    <i class="fa fa-calendar"></i>
                                    <?=$article['date']?>
                                </li>
                                <?php if( isset( $_SESSION['admin'] ) ): ?>
                                    <li class="blog-box__delete">
                                        <a href="index.php?view=blog&delete-blog=<?=$article['id']?>">
                                            <i class="fa fa-remove"></i>
                                            Удалить запись
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <div class="blog-box__descr">
                                <?=$article['description']?>
                            </div>
                            <div class="blog-box__bottom">
                                <a href="index.php?view=blog&blog-detail=<?=$article['title_url']?>" class="blog-box__more">
                                    Читать далее
                                </a>
                                <span>
                                    <i class="fa fa-comment"></i>
                                    Комментариев 30
                                </span>
                                <span>
                                    <?=$article['views']?>
                                </span>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>

            </ul>

            <ul class="pagination">

                <li>Страница: </li>
                <li>
                    <a href="index.php?view=blog">1</a>
                </li>

                <?php
                for( $i =  $limit_articles, $j = 2; $i < $count_articles; $i = $i + $limit_articles, $j++ ) {
                    echo "<li>
                        <a href='index.php?view=blog&pager=$i'>$j</a>
                    </li>";
                }
                ?>
            </ul>

            <?php }
            // иначе выводим запись по title_url
            else {?>

            <h1 class="content-box-left__title"><?=$article['title']?></h1>
            <div class="blog-detail">
                <div class="blog-box">
                    <figure>
                        <a href="">
                            <img src="static/media/blog/<?=$article['image']?>" class="" alt="a">
                        </a>
                    </figure>
                    <div class="text">
                        <?=$article['text']?>
                    </div>
                </div>
            </div>
            <?php }
            ?>
        </div>

        <div class="content-box-right">
            <div class="module-who-beautiful">
                <h3 class="module-who-beautiful__title">Кто красивее?</h3>

                <a href="#" class="module-who-beautiful__prev"></a>
                <a href="#" class="module-who-beautiful__next"></a>

                <div class="module-who-beautiful__left">
                    <div class="module-who-beautiful__img">
                        <img src="../../static/media/konkurs/1.jpg" alt="">
                    </div>
                    <p class="module-who-beautiful__name">Зарина Гаджиметова</p>
                    <div class="module-who-beautiful__count-vote">
                        <p>95</p>
                        <span>Голосов</span>
                    </div>
                    <a href="" class="module-who-beautiful__vote1">Голосовать</a>
                </div>
                <div class="module-who-beautiful__vs">VS</div>
                <div class="module-who-beautiful__right">
                    <div class="module-who-beautiful__img">
                        <img src="../../static/media/konkurs/2.jpg" alt="">
                    </div>
                    <p class="module-who-beautiful__name">Аида Абакарова</p>
                    <div class="module-who-beautiful__count-vote module-who-beautiful__count-vote--2">
                        <p>95</p>
                        <span>Голосов</span>
                    </div>
                    <a href="" class="module-who-beautiful__vote2">Голосовать</a>
                </div>

                <div class="module-who-beautiful__all">
                    <a href="">Посмотреть результаты конкурса</a>
                </div>

            </div>
        </div>

    </div>
</div>