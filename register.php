<?php
require_once(__DIR__ . '/core/session.php');
if (isPost()) {
	if (isset($_POST['sign_in'])) {
	    if (login(getParam('login'), getParam('root'), $db)) {
	        redirect('list');
	    } else {
	        print '<label>Неверные логин или пароль.</label>';
	        print '<hr>';
	    }
	} elseif (isset($_POST['register'])) {
		if (!isUser(getParam('login'), $db)){
		    $obj = new Registration(getParam('login'), getParam('root'), $db);
		    if($obj->createUser()){
		    	redirect('list');
		    }else{
		    	print '<label>Логин и/или пароль менее 1 символа не допустимы!</label>';
		    	print '<hr>';
		    }
		}else{
		    print '<label>Измените логин для регистрации!</label>';
		    print '<hr>';
		}	
	}
}
?>
	<!DOCTYPE html>
	<html lang="ru">
	<head>
		<title>Авторизация и регистрация</title>
		<meta charset="utf-8">
	</head>
		<body>
		<?php
		if (!isPost() && (!isset($_POST['sign_in']) || !isset($_POST['register']))) {
			print '<label>Зарегистрации или войдите, если уже регистрировались:</label>';
			print '<hr>';
		}
		?>
			<form method="POST" action="">
				<input type="text" name="login" placeholder="login">
				<input type="text" name="root" placeholder="root">
				<input type="submit" name="sign_in" value="Вход">
				<input type="submit" name="register" value="Регистрация">
			</form>
		</body>
	</html>


