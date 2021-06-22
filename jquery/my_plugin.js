// 🟢  1. создать файл плагина duplicate.jquery.js (имя_плагина.jquery.js):

// duplicate.jquery.js ==========================

// заготовка файла плагина ------------
(function($) {
    $.fn.duplicate = function() {
        // перебор необходим, т.к. функция плагина может быть вызвана с группой элементов, а не только с одним
        this.each(function() {

        });

        return this;  // нужно, чтобы можно было организовывать цепочки jquery в вызовах функции плагина
    };
})(jQuery); 


// пример файла плагина ---------------
(function($) {
    $.fn.duplicate = function(settings) {
        let defaults = {
            delim: ' ',  // значение разделителя по умолч, если в settings нет ключа delim
            count: 2     // значение колич повтор  по умолч, если в settings нет ключа count
        };

        let options = $.extend(defaults, settings);  // объединить два объекта, первый объект модифицируется вторым

        // console.log(this);  // this здесь объект jquery, а не элемент DOM

        this.each(function() {
            let elem = $(this);  // elem - это уже ссылка на сам элемент DOM

            let text = elem.html();
            let result = '';

            for(let i = 0; i < options.count; i++) {
                result += text;

                if(i < options.count - 1) {
                    result += options.delim;
                }
            }

            elem.html(result);
        });

        return this;
    };
})(jQuery); 

// пример вызова:  $('.ask').duplicate( {delim: ' - ', count: 3} );


// 🟢  2. подключить этот файл плагина в index.html после jquery:

//         <script src="js/jquery.min.js"></script>         // подключение jquery
//         <script src="js/duplicate.jquery.js"></script>   // подключение плагина
//         <script src="js/myscript.js"></script>           // подключение моего js
//     </body>
// </html>



// 🟢  3. вызов функции плагина в коде myscript.js:

$('.ask').duplicate();
