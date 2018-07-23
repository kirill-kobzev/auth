<?php
require_once 'db.php';
echo '<meta charset="utf-8">';

if(isset($_SESSION['user'])){	
	echo $_SESSION['user'] . ', Добро пожаловать';
	echo '<br>';
	echo "Вы зашли " . $_COOKIE['visit'] . " раз";
	echo '<br><a href="logout.php">Выход из аккаунта</a>';
}else{
	echo "Нет доступа к странцице";
}



?>
