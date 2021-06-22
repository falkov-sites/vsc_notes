// плавная прокрутка до якоря ---------
$("a[href^='#']").click(function(){
    var _href = $(this).attr("href");
    $("html, body").animate({scrollTop: $(_href).offset().top+"px"});       // скорость по умолч
    
    $("html, body").animate(
        { scrollTop: $(_href).offset().top+"px" },
        800);  // скорость 800ms
    return false;
});


// <a class="menu__link" href="#my_paragraph">my paragraph</a>

// <p id="my_paragraph">
//     Привет, как дела
// </p>
