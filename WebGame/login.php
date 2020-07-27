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
    		echo '<div style="color:green;z-index:100;background-color:white;position:absolute;padding:60px;border-radius:10px;text-align:center;duration:5s;top:17%;left:10%;">Вы успешно авторизовались</div><hr>';

    	}else{
    		$errors[]='Неверный пароль';
    	}
    }else
    {
    	$errors[]='Пользователь с таким логином не найден';
    }
    if (!empty($errors)) 
	{
		echo '<div style="color:red;z-index:100;background-color:white;position:absolute;padding:60px;border-radius:10px;text-align:center;duration:5s;top:17%;left:10%;">'.array_shift($errors).'</div><hr>';
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
 	<div class="idiot"></div>
 	<div class="formCont">
		<form action="/login.php" method="POST" style="margin-top: 20px;">
			<p>
				Введите логин<br>
				<input type="text" name="login" value="<?php echo @$data['login']; ?>">
			</p>
			<p>
				Введите пароль <br>
				<input type="password" name="password">
			</p>
			<p>
				<button type="submit" name="do_login" class="subBut">Войти</button> <a href="signup.php" class="subBut">Регистрация</a>
			</p>
		</form>	</div>	
		
 </main>
 	<footer class="otherP">
			<ul>
				<li ><a href="#"><img class="social" src="images/twitter.png"></a></li>
				<li ><a href="#"><img class="social" src="images/vk.png"></a></li>
				<li ><a href="#"><img class="social" src="images/youtube.png"></a></li>
				<li ><a href="#"><img class="social" src="images/instagram.png"></a></li>
			</ul>
		</footer>
 <script src="scriptt.js">
</script>
</body>
</html>
