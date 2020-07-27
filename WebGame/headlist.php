<?php 
require "db.php";
$data=$_POST;
$login = $_SESSION['logged_user']->login;


 $coins=R::getCell( 'SELECT coins FROM users WHERE login=?',[$login] );
 $level=R::getCell( 'SELECT level FROM users WHERE login=?',[$login] );
 $widthSum=R::getCell( 'SELECT width FROM users WHERE login=?',[$login] );

/*$liders=R::find( 'users', ' limit 3 ');
 foreach ($liders as $lider ) {
 	echo '<p style="position:absolute;top:300px;left:300px;color:white;">Login:'.$lider->login.'</p><br>';
 }*/


 
if(isset($_SESSION['logged_user'])){
$user=R::findOne('users','login=?',[$login]);
	    $user->coins=$data['coins'];
	    $user->level=$data['level'];
		$user->width=$data['widthSum'];
		R::store($user);}
?>

<?php
if(isset($_SESSION['logged_user'])){
echo '<div style="color:white;position: absolute;right:5px;font-size:16px;top:80px;padding:2px;padding-left:3px;z-index:100;">Имя пользователя:'.$_SESSION['logged_user']->login.'<br><a href="logout.php"><button style="margin-top:8px;cursor:pointer;padding:5px 10px;">Выйти</button></a></div>';}
?>

<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap&subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body onload="outputCount();outputlevel();widthOutput();level();">

<div id="allert">
	
	<p><img src="images/close.png" onclick="closeWind();" style="width: 40px; height: 40px;cursor: pointer;margin-bottom: 30px;">Йоу на связи Mr.Flex! Первый кто наберёт 100 000 000<img class="coin" src="images/euro.png">монет получит 1000$ поторопитесь! <br><br><br>
	P.S: Перед выходом нажмите кнопку "Сохранить данные" иначе они будут утеряны</p>

</div>

	<header>
		<ul>
			<li><a href="shop.php">Магазин</a></li>
			<li><a href="about.php">О проекте</a></li>
			<li><a href="login.php">Вход/Регистрация</a></li>
			<li>Монеты:<span id="count">0</span><img class="coin" src="images/euro.png"></li>
		</ul>
	</header>
<main> 

<form method="POST" id="formDb">
			<textarea  id="forDB" name="coins"></textarea>
			<textarea  id="forDBb" name="level"></textarea>
			<textarea  id="forDBbb" name="widthSum"></textarea>
			<button name="do_coins" class="saveBut">Сохранить данные</button>
		</form>

		<div class="level">
			Level:<span id="level">1</span>
			<div id="levelLine">
				<div id="line"></div>
			</div>
		</div>
        
		<div class="head" onclick="widthSum=widthSum+1;outputCount();level();outputlevel();widthOutput();">
			<div class="eyes">
			    <div class="eye">
				    <div class="zrac"></div>
			    </div>
			    <div class="eye">
				    <div class="zrac"></div>
			    </div>
		    </div>
			<div class="mouth"></div>
		</div>
		<div class="rules">
			
			<div class="rule">
				<img src="">
				1-5lvl <br>по 1 монете за клик
			</div>
			<div class="rule">
				<img src="">
				5-10lvl <br>по 5 монет за клик
			</div>
			<div class="rule">
				<img src="">
				10-30lvl <br>по 10 монет за клик
			</div>
			<div class="rule">
				<img src="">
				30-50lvl <br>по 50 монет за клик
			</div>
			<div class="rule">
				<img src="">
				50-100lvl <br>по 100 монет за клик
			</div>
			<div class="rule">
				<img src="">
				100-500lvl <br>по 500 монет за клик
			</div>
			<div class="rule">
				<img src="">
				500-1000lvl <br>по 1000 монет за клик
			</div>
		</div>

		<div class="prizes">
			
			<div class="prize">
				<img src="images/creative.png" class="prizeImg"><br>
				10$ <br>Самый креативный никнейм
			</div>
			<div class="prize">
				<img src="images/motivation.png" class="prizeImg"><br>
				 100$<br>Набравшему больше всего <img class="coin" src="images/euro.png"> за сутки
			</div>
			<div class="prize">
				<img src="images/award.png" class="prizeImg"><br>
				1000$ <br>1 набравшему 100 000 000<img class="coin" src="images/euro.png">
			</div>
		</div>
		<div class="again"></div>

		<footer>
			<ul>
				<li ><a href="#"><img class="social" src="images/twitter.png"></a></li>
				<li ><a href="#"><img class="social" src="images/vk.png"></a></li>
				<li ><a href="#"><img class="social" src="images/youtube.png"></a></li>
				<li ><a href="#"><img class="social" src="images/instagram.png"></a></li>
			</ul>
		</footer>
</main>
<script>
var coins="<?php echo $coins; ?>";
var DBlvl="<?php echo $level; ?>";
var DBwidth="<?php echo $widthSum; ?>";

var counter;
var elem=document.getElementById('count');
var lvl=document.getElementById('line');
var lvlid=document.getElementById('level');
var widthSum;
var lvlsum=1;
var windowAllert;
windowAllert=document.getElementById('allert');
var forDb=document.getElementById('forDB');
var forDbb=document.getElementById('forDBb');
var forDbbb=document.getElementById('forDBbb');

widthSum=0;
counter=0;


if (coins>0){
	lvlsum=parseInt(DBlvl);
	counter=parseInt(coins);
	widthSum=parseInt(DBwidth);
}

function closeWind() {
	windowAllert.style.display='none';
}

function widthOutput() {
	forDbbb.innerHTML=widthSum;
}

function outputlevel() {	
	lvlid.innerHTML=lvlsum;
	forDbb.innerHTML=lvlsum;	
}
function outputCount() {
	if (lvlsum>=1 && lvlsum<5) {
		counter=counter+1;
	}
	if (lvlsum>=5 && lvlsum<10) {
		counter=counter+5;
		lvl.style.backgroundColor='#feb9c8';
	}
	if (lvlsum>=10 && lvlsum<30) {
		counter=counter+10;
		lvl.style.backgroundColor='#80ac7b';
	}
	if (lvlsum>=30 && lvlsum<50) {
		counter=counter+50;
		lvl.style.backgroundColor='#ffc60b';
	}
	if (lvlsum>=50 && lvlsum<100) {
		counter=counter+100;
		lvl.style.backgroundColor='#fd0054';
	}
	if (lvlsum>=100 && lvlsum<500) {
		counter=counter+500;
		lvl.style.backgroundColor='#f05d23';
	}
	if (lvlsum>=500 && lvlsum<1000) {
		counter=counter+1000;
		lvl.style.backgroundColor='#7971ea';
	}
	elem.innerHTML=counter;
	forDb.innerHTML=counter;
}
function level() {
	if (widthSum==0) {
		lvl.style.width='0px';
	}
	if (widthSum==1) {
		lvl.style.width='10px';
	}
	if (widthSum==2) {
		lvl.style.width='20px';
	}
	if (widthSum==3) {
		lvl.style.width='30px';
	}
	if (widthSum==4) {
		lvl.style.width='40px';
	}
	if (widthSum==5) {
		lvl.style.width='50px';
	}
	if (widthSum==6) {
		lvl.style.width='60px';
	}
	if (widthSum==7) {
		lvl.style.width='70px';
	}
	if (widthSum==8) {
		lvl.style.width='80px';
	}
	if (widthSum==9) {
		lvl.style.width='90px';
	}
	if (widthSum==10) {
		lvl.style.width='100px';
	}
	if (widthSum==11) {
		lvl.style.width='110px';
	}
	if (widthSum==12) {
		lvl.style.width='120px';
	}
	if (widthSum==13) {
		lvl.style.width='130px';
	}
	if (widthSum==14) {
		lvl.style.width='140px';
	}
	if (widthSum==15) {
		lvl.style.width='150px';
	}
	if (widthSum==16) {
		lvl.style.width='160px';
	}
	if (widthSum==17) {
		lvl.style.width='170px';
	}
	if (widthSum==18) {
		lvl.style.width='180px';
	}
	if (widthSum==19) {
		lvl.style.width='190px';
	}
	if (widthSum==20) {
		lvl.style.width='200px';
	}
	if (widthSum==21) {
		lvl.style.width='210px';
	}
	if (widthSum==22) {
		lvl.style.width='220px';
		lvlsum=lvlsum+1;
		widthSum=0;
	}
	
}

</script>
	
</body>
</html>