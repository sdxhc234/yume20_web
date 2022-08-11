<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>TimeNotification</title>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
	<link href="css/timeStylesheet.css" rel="stylesheet" type="text/css">
	<?php
		require_once('generalFunc.php');
		$termTime=[
			['name'=>'赤色', 'timeS'=>9, 'timeE'=>11, 'class'=>'red'],
			['name'=>'青色', 'timeS'=>11, 'timeE'=>13, 'class'=>'blue'],
			['name'=>'緑色', 'timeS'=>13, 'timeE'=>15, 'class'=>'green']
		];
		$nowH = 0;
		$tMsg="Wait...";
		$sMsg="Wait.";
		$bgClass="";

	if(checkEventDate()){
		if(date("i")>=20){ //determine check Hour
			$nowH = date("H");
		} else { 
			$nowH = date("H")-1;
		}
		foreach($termTime as $value){ // change the contents according the hour
			if($value['timeS'] <= $nowH && $nowH < $value['timeE']){
				$tMsg = "只今 ".$value['name']." チケットの時間です";
				$sMsg = $value['timeE']."時10分まで有効です";
				$bgClass = $value['class'];
			}
		}
		unset($value);

		if($bgClass==""){
			$minTimeS= min( array_column($termTime, 'timeS'));
			$maxTimeE= max( array_column($termTime, 'timeE'));
			$bgClass="other";
			if($nowH<$minTimeS){
				$tMsg =	"開場までしばらくお待ちください";
				$sMsg = $minTimeS."時20分より開場します";
			} else if($maxTimeE<=$nowH){
				$tMsg =	"ご来場ありがとうございました";
				$sMsg = "今年度夢工祭は終了しました。<br>またのお越しをお待ちしております";
			}
		}
	} else { 
		$tMsg = "コチラにチケットの時間が表示されます";
		$sMsg = "ご来場前に体調チェックをお願いします。";
		$bgClass="other";
	}
	?>
	<script>
		window.onload = function(){
			setTimeout(() => {
				location.reload()
			}, 3000000);
		}
	</Script>
	</head>

<body id="bg" class="<?php echo $bgClass?>">
	<h2 id="ticketName"><?php echo $tMsg?></h2>
	<p id="endTime"><?php echo $sMsg?></p>
</body>
</html>
