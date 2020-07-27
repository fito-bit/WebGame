<?php
require "db.php";

$data=$_POST;
if (isset($data['do_signup'])) {
	//registr
	$errors=array();
	if (trim($data['login'])=='') {
		$errors[]='Введите логин!';
	}
	if (trim($data['number'])=='') {
		$errors[]='Введите email!';
	}
	if ($data['password']=='') {
		$errors[]='Введите пароль!';
	}
	if ($data['password_2']!=$data['password']) {
		$errors[]='Пароли не совпадают!';
	}
	if (R::count('users',"login=?",array($data['login']))>0){
		$errors[]='Пользователь с таким логином уже существует!';
	}
	if (R::count('users',"number=?",array($data['email']))>0){
		$errors[]='Пользователь с таким email уже зарегистрирован!';
	}
	if (empty($errors)) {
		//regaem
		$user=R::dispense('users');
		$user->login=$data['login'];
		$user->name=$data['email'];
		$user->coins=0;
		$user->level=1;
		$user->width=1;
		$user->password=password_hash($data['password'], PASSWORD_DEFAULT);
		R::store($user);
		echo '<div style="color:green;z-index:100;background-color:white;position:absolute;padding:60px;border-radius:10px;text-align:center;duration:5s;top:17%;left:10%;">Вы успешно зарегистрировались</div>';
	}
	else
	{
		echo '<div style="color:red;z-index:100;background-color:white;position:absolute;padding:60px;border-radius:10px;text-align:center;duration:5s;top:17%;left:10%;">'.array_shift($errors).'</div>';
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
 	<div class="formCont1">
		<form action="/signup.php" method="POST" id="signup">
			<p>
				Login:<br>
				<input type="text" name="login" value="<?php echo @$data['login']; ?>">
			</p>
			<p>
			    Email:<br>
				<input type="text" name="number" value="<?php echo @$data['email']; ?>">
			</p>
			<p>
				Пароль:<br>
				<input type="password" name="password">
			</p>
			<p>
				Повторите пароль:<br>
				<input type="password" name="password_2">
			</p>
			<p>
				<button type="submit" name="do_signup" class="subBut">Зарегистрироваться</button>
				<a href="login.php" class="subBut" style="width: 100px;margin-left: 8px;">Войти</a>
			</p>

		</form>
	</div>	
	<footer class="otherP">
			<ul>
				<li ><a href="#"><img class="social" src="images/twitter.png"></a></li>
				<li ><a href="#"><img class="social" src="images/vk.png"></a></li>
				<li ><a href="#"><img class="social" src="images/youtube.png"></a></li>
				<li ><a href="#"><img class="social" src="images/instagram.png"></a></li>
			</ul>
		</footer>
 </main>
 <script src="script.js">
</script>
</body>
</html>