// распечатка всех свойств, методов и событий объекта:
// var mydiv = document.querySelector('#mydiv');  
// print_object(mydiv);  
// print_object(mydiv.style);  вложенный объект
function print_object(obj) {
    var result = '<ul>';

    for(i in obj) {
        result += '<li><b>' + i + '</b>: ' + obj[i] + '</li>';
    }

    result += '</ul>';

    document.write(result);
}

