<?php 
$driver = 'mysql';
$host = 'localhost';
$db_name = 'test';
$db_user = 'root';
$db_pass = '';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try{
	$pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset",$db_user,$db_pass, $options);

	if(isset($_COOKIE['visit'])){
		setcookie('visit', ++$_COOKIE['visit'], time() + 5);
	}else{
		setcookie('visit', 1, time() + 5);
		$_COOKIE['visit'] = 1;
	}

	session_start();

}catch(PDOException $e){
	die("Не могу подключиться к базе данных");
}

// $result  = $pdo->query('SELECT * FROM testExtJS');

// while($row = $result->fetch(PDO::FETCH_ASSOC)){
// 	echo $row['name'] . ' ' . $row['mail'] . '<br>';
// }

// while($row = $result->fetch(PDO::FETCH_OBJ)){
// 	echo $row->name . ' ' . $row->mail . '<br>';
// }
?>
