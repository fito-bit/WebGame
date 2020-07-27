<?php
require "db.php";

$data=$_POST;
if (isset($data['do_login'])) {
	//vhod
	$errors=array();
	$user=R::findOne('users','login=?',array($data['login']));
    if ($user) {
    	if (password_verify($data['password'],$user->password)) {
    		$_SESSION['logged_user']=$user;
    		echo '<div style="color:green;">Вы успешно авторизовались</div><hr>';

    	}else{
    		$errors[]='Неверный пароль';
    	}
    }else
    {
    	$errors[]='Пользователь с таким логином не найден';
    }
    if (!empty($errors)) 
	{
		echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
	}
}

?>
<?php
if(isset($_SESSION['logged_user'])){
echo '<div style="color:white;position: absolute;right:5px;font-size:16px;top:80px;padding:2px;padding-left:3px;z-index:100;">Имя пользователя:'.$_SESSION['logged_user']->login.'<br><a href="logout.php"><button style="margin-top:8px;cursor:pointer;">Выйти</button></a></div>';}
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap&subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>test site</title>
</head>
<body>
	<header>
		<ul>
			<li><a href="headlist.php">Главная</a></li>
			<li><a href="shop.php">Магазин</a></li>
			<li><a href="about.php">О проекте</a></li>
			<li><a href="login.php">Вход/Регистрация</a></li>
		</ul>
	</header>
 <main>
 	<div class="shopAllert">
 		Сейчас сайт находится в поиске спонсоров!<br>
 		Здесь могут быть ваши товары!
 	</div>
 </main>
 	<footer class="otherP">
			<ul>
				<li ><a href="#"><img class="social" src="images/twitter.png"></a></li>
				<li ><a href="#"><img class="social" src="images/vk.png"></a></li>
				<li ><a href="#"><img class="social" src="images/youtube.png"></a></li>
				<li ><a href="#"><img class="social" src="images/instagram.png"></a></li>
			</ul>
		</footer>
 <script src="script.js">
</script>
</body>
</html>