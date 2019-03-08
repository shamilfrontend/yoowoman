<div class="main-content">
    <div class="container">

        <div class="content-box-left">

            <div class="module-add-secret">
                <h3 class="module-add-secret__title">Поделиться секретом</h3>
                <form action="" method="post">
                    <input class="module-add-secret__name" name="secret__name" type="text" placeholder="Ваше имя" value="<? if(isset( $_SESSION['admin'] )) {echo ADMIN_NAME;} ?>">
                    <input class="module-add-secret__mail" name="secret__mail" type="email" placeholder="Ваш email" value="<? if(isset( $_SESSION['admin'] )) {echo ADMIN_EMAIL;} ?>">
                    <textarea placeholder="Ваш секретик..." name="secret__text" required></textarea>
                    <div class="module-add-secret__btngroup">
                        <button name="secret__btn">Добавить</button>
                        <input type="checkbox" name="secret__anonim" id="module-add-secret" checked>
                        <label for="module-add-secret">Анонимно</label>
                    </div>
                    <p>
                        <?php
                            if( !empty( $_SESSION['msg'] ) ) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                        ?>
                    </p>
                </form>
            </div>

            <div class="module-last-secret">
                <h3 class="module-last-secret__title">Последние откровения</h3>

                <div class="secrets">

                    <?php
                    // if( !empty($secrets_home) ) {}
                    foreach ($secrets_home as $item): ?>
                    <div class="secrets__item">
                        <div class="secrets__item-body">
                            <!--admin-->
                            <div class="secrets-admin">
                                <?php if( is_admin() ): ?>
                                <a href="index.php?view=secrets&delete-secret=<?=$item['id']?>" class="secrets-admin__del">Удалить</a>
                                <?php endif; ?>
                            </div>
                            <!--admin end-->
                            <div class="secrets__user-img">
                                <img src="static/media/<?=$item['user_image']?>" alt="a">
                            </div>
                            <div class="secrets__top-info">
                                <h4 class="secrets__author-post"><?=$item['name']?></h4>
                                <p class="secrets__post-date"><?=$item['date']?></p>
                            </div>
                            <p class="secrets__quest">
                                <?=$item['text']?>
                            </p>
                            <p class="secrets__more-text">Показать полностью…</p>
                            <div class="secrets__bottom">
                                <!--p class="secrets__share">
                                    <a href="">Поделиться</a>
                                </p-->
                                <!--p class="secrets__comment">Комментировать</p-->
                            </div>
                        </div>
<!--                        <div class="secrets-comment-list">-->
<!--                            <p class="secrets-comment-list__count">Показать все комментариев</p>-->
<!--                            <div class="secrets-comment-list__item">-->
<!--                                <div class="secrets-comment-list__img">-->
<!--                                    <img src="static/media/1.jpg" alt="a">-->
<!--                                </div>-->
<!--                                <div class="secrets-comment-list__right">-->
<!--                                    <p class="secrets-comment-list__name">Шамиль Алисултанов</p>-->
<!--                                    <p class="secrets-comment-list__text">-->
<!--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consequatur magni nisi numquam repudiandae similique.-->
<!--                                    </p>-->
<!--                                    <p class="secrets-comment-list__bottom">-->
<!--                                        <span class="secrets-comment-list__time">10 минут назад</span>-->
<!--                                        <a href="" class="secrets-comment-list__reply">Ответить</a>-->
<!--                                        <a href="" class="secrets-comment-list__del">Удалить</a>-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="secrets-comment-list__item">-->
<!--                                <div class="secrets-comment-list__img">-->
<!--                                    <img src="static/media/1.jpg" alt="a">-->
<!--                                </div>-->
<!--                                <div class="secrets-comment-list__right">-->
<!--                                    <p class="secrets-comment-list__name">Шамиль Алисултанов</p>-->
<!--                                    <p class="secrets-comment-list__text">-->
<!--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consequatur magni nisi numquam repudiandae similique.-->
<!--                                    </p>-->
<!--                                    <p class="secrets-comment-list__bottom">-->
<!--                                        <span class="secrets-comment-list__time">10 минут назад</span>-->
<!--                                        <a href="" class="secrets-comment-list__reply">Ответить</a>-->
<!--                                        <a href="" class="secrets-comment-list__del">Удалить</a>-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="secrets-comment-list__item">-->
<!--                                <div class="secrets-comment-list__img">-->
<!--                                    <img src="static/media/1.jpg" alt="a">-->
<!--                                </div>-->
<!--                                <div class="secrets-comment-list__right">-->
<!--                                    <p class="secrets-comment-list__name">Шамиль Алисултанов</p>-->
<!--                                    <p class="secrets-comment-list__text">-->
<!--                                        last-->
<!--                                    </p>-->
<!--                                    <p class="secrets-comment-list__bottom">-->
<!--                                        <span class="secrets-comment-list__time">10 минут назад</span>-->
<!--                                        <a href="" class="secrets-comment-list__reply">Ответить</a>-->
<!--                                        <a href="" class="secrets-comment-list__del">Удалить</a>-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="secrets-comment-add">-->
<!--                            <form method="post">-->
<!--                                <div class="secrets-comment-add__wrap">-->
<!--                                    <div class="secrets-comment-add__img">-->
<!--                                        <img src="static/media/1.jpg" alt="">-->
<!--                                    </div>-->
<!--                                    <textarea placeholder="Написать комментарий..."></textarea>-->
<!--                                </div>-->
<!--                                <button class="secrets-comment-add__send">Добавить</button>-->
<!--                                <ul class="smiles-block secrets-comment-add__smiles">-->
<!--                                    <li class="smiles-block__item">-->
<!--                                        <img src="static/smiles/1.smile.gif" alt="">-->
<!--                                    </li>-->
<!--                                    <li class="smiles-block__item">-->
<!--                                        <img src="static/smiles/2.sad.gif" alt="">-->
<!--                                    </li>-->
<!--                                    <li class="smiles-block__item">-->
<!--                                        <img src="static/smiles/3.all-good.gif" alt="">-->
<!--                                    </li>-->
<!--                                    <li class="smiles-block__item">-->
<!--                                        <img src="static/smiles/4.tought.gif" alt="">-->
<!--                                    </li>-->
<!--                                    <li class="smiles-block__item">-->
<!--                                        <img src="static/smiles/5.big-rill.gif" alt="">-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </form>-->
<!--                        </div>-->
                    </div>
                    <?php endforeach; ?>

                </div>

                <div class="module-last-secret__all">
                    <a href="index.php?view=secrets">Посмотреть все</a>
                </div>
            </div>

        </div>

        <div class="content-box-right">

            <div class="module-who-beautiful">
                <h3 class="module-who-beautiful__title">Кто красивее?</h3>

                <a href="#" class="module-who-beautiful__prev"></a>
                <a href="#" class="module-who-beautiful__next"></a>

                <div class="module-who-beautiful__left">
                    <div class="module-who-beautiful__img">
                        <img src="static/media/konkurs/1.jpg" alt="">
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
                        <img src="static/media/konkurs/2.jpg" alt="">
                    </div>
                    <p class="module-who-beautiful__name">Аида Абакарова</p>
                    <div class="module-who-beautiful__count-vote module-who-beautiful__count-vote--2">
                        <p>95</p>
                        <span>Голосов</span>
                    </div>
                    <a href="" class="module-who-beautiful__vote2">Голосовать</a>
                </div>

                <div class="module-who-beautiful__all">
                    <a href="competitions.php">Посмотреть результаты конкурса</a>
                </div>

            </div>

        </div>

    </div>
</div>