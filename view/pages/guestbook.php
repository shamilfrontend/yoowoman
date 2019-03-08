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

            <h1 class="content-box-left__title">Гостевая книга</h1>

            <div class="guestbook">

                <p class="guestbook__descr">
                    Здесь можно оставлять отзывы и предложения о нашем сайте :-)
                </p>

                <div class="guestbook-add">
                    <form action="" method="post">
                        <input name="guestbook__name" type="text" class="guestbook-add__input" placeholder="Ваше имя" required value="<? if(isset( $_SESSION['admin'] )) {echo ADMIN_NAME;} ?>">
                        <input name="guestbook__mail" type="email" class="guestbook-add__input" placeholder="Ваш email" required value="<? if(isset( $_SESSION['admin'] )) {echo ADMIN_EMAIL;} ?>">
                        <textarea name="guestbook__text" placeholder="Ваше сообщение" required></textarea>
                        <button name="guestbook__btn">Отправить</button>
                        <input type="checkbox" name="guestbook__no-robot" id="guestbook-add">
                        <label for="guestbook-add">Я не робот</label>
                        <p>
                            <?php
                            ?>
                        </p>
                    </form>
                </div>
                <ul class="guestbook-list">

                    <?php foreach ($guestbook_items as $item): ?>

                    <li class="guestbook-item ">
                        <div class="guestbook-box">
                            <div class="guestbook-box__photo">
                                <img src="static/media/<?=$item['user_image']?>" class="avatar fl">
                            </div>
                            <span class="guestbook-box__brack"></span>
                            <div class="guestbook-box__msgcont">
                                <p class="guestbook-box__info">
                                    <span class="guestbook-box__username"><?=$item['name']?></span>
                                    <span class="guestbook-box__dateadd"><?=$item['date']?></span>
                                </p>
                                <p class="guestbook-box__mag"><?=$item['text']?></p>
                            </div>
                        </div>
                    </li>

                    <?php endforeach; ?>

                </ul>
            </div>

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