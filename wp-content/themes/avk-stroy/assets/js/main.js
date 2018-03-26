(function($){
  /* ---------набор функций--------------- */

  //автоувеличение ширины инпута
  function resizeInput() {
    var l =  $(this).val().length
    $(this).css('width', (l*16)+3);
  }
  //автоувеличение ширины инпута

  //получить ральный верхний левый угол обьекта в рекурсии
  var cumulativeOffset = function(element) {
    var top = 0, left = 0;
    do {
      top += element.offsetTop  || 0;
      left += element.offsetLeft || 0;
      element = element.offsetParent;
    } while(element);

    return {
      top: top,
      left: left
    };
  }; 
  //получить ральный верхний левый угол обьекта в рекурсии

  /* биндим контекст */
  function bind(func, context) { // первое перменная - функция, второе контекст
    return function() { // возвращаем анаонимную функцию, при ее вызове выоветься func.apply с уже имеющимя контекстом из переменной context
      return func.apply(context, arguments); //arguments любое кол во аргументов. такой вызов свяжет функцию с ранее переданным аргументом
    };
  }

  /* ---------ннабор функций---------н */



  $(document).ready(function(){
    $("body").removeClass("pageload");

    //scroll-to  - прокрутчик
    $(".scroll-to").click(function() {
      var id = $(this).attr("rel");
      var to = $("#"+id).offset().top-10;
      $('html, body').animate({
        scrollTop: to
      }, 500);
    });

    //f-ajax   - отправка форм
    $('.f-ajax').on('submit', function(event){
      event.preventDefault();
      var $form = $(this);

      var data = $form.serialize();
      data['token'] = "tnbm567sgfg4556sdfDSg";

      $.ajax({
        url: $form.attr("action"),
        type: 'POST',
        data: '',
        success: function(result) {
          if(result == "OK"){
            alert("Заявка отправлена!");       
          }
          else
            alert("Произошла ошибка!");
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert("Произошла ошибка!");
        }
      });
    });

    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    ;(function(){

        var zoom = 15;

        var adress = [59.91463756420445, 30.4163985];

    

        ymaps.ready(function () {

            var myMap;

            

            ymaps.geocode(adress).then(function (res) {

                myMap = new ymaps.Map('map', {

                    center: res.geoObjects.get(0).geometry.getCoordinates(),

                    zoom: zoom

                });

                var myPlacemark = new ymaps.Placemark(myMap.getCenter(), {

                    hintContent: 'Октябрьская набережная, 6В',

                    //balloonContent: 'Это красивая метка'

                }, {

                        // Опции.

                        // Необходимо указать данный тип макета.

                        iconLayout: 'default#image',

                        // Своё изображение иконки метки.

                        iconImageHref: '../images/map-icon.png',

                        // Размеры метки.

                        iconImageSize: [30, 30],

                        // Смещение левого верхнего угла иконки относительно

                        // её "ножки" (точки привязки).

                        iconImageOffset: [-15, -30]

                    });

    

                myMap.geoObjects.add(myPlacemark);

                myMap.behaviors.disable('scrollZoom');

            });

    

        });

    })();

    
    

    
    ;(function () {

    

        var $container = $('.objects-list'),

            $link = $('.aside__link'),

            $trigger = $('.objects__link'); // переключатель объектовы выполненных/в работе

            

    

        $container.load("activeObjects-ajax.html #electrical-works", function() {

    

            $('.objects-list__more').click(function (e) {

                e.preventDefault();

                

                var $this = $(this);

    

                var images = $this.siblings('.all-images').children('.fancybox')

    

                $.fancybox.open(images, {

                    arrows: true,

                    toolbar: false,

                })

                return false;

            });

    

        });

    

        $trigger.on('click', function(e) {

            e.preventDefault();

    

            var $this = $(this),

                type = $this.attr('data-href');

    

            if ($this.hasClass('active')) {

                console.log('Уже');

                return;

            };

    

            $trigger.removeClass('active');

            $this.addClass('active');

    

            var $activeLink = $link.filter('.active'),

                $anchor = $activeLink.attr('data-href');

    

            $container.load( type + "Objects-ajax.html " + $anchor, function () {

    

                $('.objects-list__more').click(function (e) {

                    e.preventDefault();

    

                    var $this = $(this);

    

                    var images = $this.siblings('.all-images').children('.fancybox')

    

                    $.fancybox.open(images, {

                        arrows: true,

                        toolbar: false,

                    })

                    return false;

    

                });

            });

        });

    

        $link.on('click', function(e) {

            e.preventDefault();

    

            var $this = $(this),

                $anchor = $this.attr('data-href'),

                $activeTrigger = $trigger.filter('.active'),

                type = $activeTrigger.attr('data-href');

    

            if ($this.hasClass('active')) {

                console.log('Уже');

                return;

            };

    

            $link.removeClass('active');

            $this.addClass('active');

            

            $container.load(type + "Objects-ajax.html " + $anchor, function() {

    

                $('.objects-list__more').click(function (e) {

                    e.preventDefault();

    

                    var $this = $(this);

    

                    var images = $this.siblings('.all-images').children('.fancybox')

    

                    $.fancybox.open(images, {

                        arrows: true,

                        toolbar: false,

                    })

                    return false;

    

                });

            });

            

    

    

        });

    

    })();

    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    

    
    
  });

})(jQuery)