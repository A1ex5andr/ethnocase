$(document).ready( function() {

function send()
{
//Получаем параметры
var data = $('#q').val();
  // Отсылаем паметры
       $.ajax({
                type: "POST",
                url: "1.php",
                data: "q="+q,
                // Выводим то что вернул PHP
                success: function(html) {
 //предварительно очищаем нужный элемент страницы
                        $("#q").empty();
//и выводим ответ php скрипта
                        $("#q").append(html);
                }
        });

}

});