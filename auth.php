<?php 
require_once 'db.php';

$login = trim($_POST['login']);
$password = trim($_POST['password']);

if(!empty($login) && !empty($password)){


	$sql  = 'SELECT login, password FROM users WHERE login = :login';
	$params = [':login' => $login];

	$stmt = $pdo->prepare($sql);
	$stmt->execute($params);

	$user = $stmt->fetch(PDO::FETCH_OBJ);

	if($user){

		if (password_verify($password,$user->password)){
			$_SESSION['user'] = $user->login;
			header('Location: admin.php');
		}else{
			echo 'Неверный логин или пароль';
		}
	}else{
			echo 'Неверный логин или пароль';
		}
	}
else{
		echo 'Пожалуйста, заполните все поля';
	}

 ?>
