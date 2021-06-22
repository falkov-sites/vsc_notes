https://github.com/agragregra/uniMail
https://www.youtube.com/watch?v=6h-3Bo-xI7A

- должна быть подключена jq
- на сайте должна быть включена поддержка php

-------------------------------------------------------------------------------
🍎  1. Создать файл mail.php рядом с index.html:

<?php

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

	$project_name = trim($_POST["project_name"]);
	$admin_email  = trim($_POST["admin_email"]);
	$form_subject = trim($_POST["form_subject"]);

	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
} else if ( $method === 'GET' ) {

	$project_name = trim($_GET["project_name"]);
	$admin_email  = trim($_GET["admin_email"]);
	$form_subject = trim($_GET["form_subject"]);

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );

-------------------------------------------------------------------------------
🍎  2. Добавить к нашему script.js:

$(document).ready(function() {             // это для jq

	//E-mail Ajax Send
	$("footer__form").submit(function() {  // здесь класс нашей формы
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php",               // путь до файла mail.php, здесь он лежит в корне рядом с index.html
			data: th.serialize()
		}).done(function() {
			alert("Thank you!");           // сообщение об отправке, лучше сюда вставить всплывающее окно
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

});

-------------------------------------------------------------------------------
🍎  3. index.html:

<form>

    // Hidden Required Fields (нужно эти поля вставить перед полями ввода нашей формы)
    <input type="hidden" name="project_name" value="Site Name">       // с какого сайта
    <input type="hidden" name="admin_email"  value="admin@mail.com">  // куда будут отправляться письма
    <input type="hidden" name="form_subject" value="Form Subject">    // на сайте мб несколько форм

    // видимые поля ввода формы (добавить name к каждому input, это будут имена полей в табл форме в письме)
    <input type="text" name="Name"   placeholder="You name..." required><br>
    <input type="text" name="E-mail" placeholder="You E-mail..." required><br>
    . . .
    <input type="text" name="Phone"  placeholder="You phone..."><br>

    <button>Send</button>

</form>