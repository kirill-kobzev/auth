<meta charset="utf-8">
<?php 

require_once 'db.php';

$login = trim($_POST['login']);
$password = trim($_POST['password']);

if(!empty($login) && !empty($password)){

	$sql_check = 'SELECT EXISTS(SELECT login FROM users WHERE login = :login)';
	$stmt_check = $pdo->prepare($sql_check);
	$stmt_check->execute([':login'=> $login]);

	if($stmt_check->fetchColumn()){
		die('Логин занят');
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	$sql = 'INSERT INTO users(login, password) VALUES(:login, :password)';
	$params = [':login' => $login, ':password' => $password];

	$stmt = $pdo->prepare($sql);
	$stmt->execute($params);

	echo 'Вы зарегистрировались';

 }else{

 	echo 'Заполините все полня';

 }

 ?>
