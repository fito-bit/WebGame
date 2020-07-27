
/*var counter;
var elem=document.getElementById('count');
var lvl=document.getElementById('line');
var lvlid=document.getElementById('level');
var widthSum;
var coins="<?php echo $coins; ?>";
var test=document.getElementById('test');
var lvlsum=1;
var forDb=document.getElementById('forDB');
widthSum=0;
function test() {
	
	test.innerHTML=coins;
}
function outputlevel() {
	
	lvlid.innerHTML=lvlsum;
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


