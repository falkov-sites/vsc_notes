<?php
// текст вида '21 комментарий'(склоняется слово после числа):
function plural_form_after($number, $after_1_2_5) {
	$cases = array (2, 0, 1, 1, 1, 2);
	echo $number.' '.$after_1_2_5[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}

// вызов: plural_form_after(число, варианты написания для количества 1, 2 и 5)
plural_form_after(get_comments_number(), array('комментарий','комментария','комментариев') );



// текст вида 'опубликован 21 комментарий' (склоняется слово и перед числом, и после числа)
function plural_form_beforeafter($number, $before_1_2_5, $after_1_2_5) {
	$cases = array(2, 0, 1, 1, 1, 2);

	echo $before_1_2_5[ ( $number % 100 > 4 && $number % 100 < 20 ) ? 2: $cases[ min( $number % 10, 5 )]] . 
	' ' . $number . ' ' . 
	$after_1_2_5[($number % 100 > 4 && $number % 100 < 20)? 2: $cases[min($number % 10, 5)]];
}

// вызов: plural_form_beforeafter(число, варианты для 1 2 и 5 перед числом, варианты для 1 2 и 5 после числа)
plural_form_beforeafter(
	get_comments_number(),
	array('опубликован','опубликовано','опубликовано'),
	array('комментарий','комментария','комментариев')
);
?>


<!-- чтобы текст был ссылкой: -->
<a href="<?php the_permalink() ?>#comments">[тут вставляем вышеуказанный PHP-код, который выводит количество комментов]</a>
