(function() {

    // tinymce run
    tinymce.init({
        selector: '.admin-blog-add__text',
        theme: 'modern',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: 'css/content.css',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    });


    // liTranslit
    $('.js-blog-title').liTranslit({
        elAlias: $('.js-blog-title-url')
    });


    // modal
    $('.fancybox').fancybox({
            helpers : {
                overlay : {
                    locked: false
                }
            },
            padding: 0,
            fitToView:false,
            scrolling: 'hidden'
        }
    );
    // modal end

    // фиксация при скроле
    var header_h = $('.page-header').height() ; // Высота шапки
    var module_beautiful = $('.module-who-beautiful');
    module_beautiful.css(
        {
            'position' : 'fixed',
            'top' : header_h + 'px',
            'width' : '690px'
        }
    );

    $(window).scroll(function(){
        var top = $(window).scrollTop(); // сколько отскролили сверху
        if(top < header_h){
            module_beautiful.css({'top': header_h - top +'px'});
        } else {
            module_beautiful.css({'top': '10px'});
        }
        // если отскроленное сверху меньше заданного нами значения, то примени к нему top и значение
        // иначе примени top 0
    });
    // фиксация при скроле end


    // показываем комменты секрета по клику
    $('.secrets-comment-list__count').click(function(e) {
        e.preventDefault();
        $(this).parent('.secrets-comment-list').children('.secrets-comment-list__item').slideDown   ();
    });

    // Открывать полный текст секрета
    $('.secrets__more-text').click(function(e) {
        e.preventDefault();
        $(this).parent().children('.secrets__quest').css({
            'height': 'auto'
        });
    });


    // Переключение блока добавить в блог
    $('.admin-blog__title').click(function(e) {
        e.preventDefault();
        $(this).parent().children('.admin-blog-add').stop().slideToggle();
    });

}());