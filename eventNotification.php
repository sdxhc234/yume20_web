<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>TimeNotification</title>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
	<link href="css/eventStylesheet.css" rel="stylesheet" type="text/css">
	<script src="scripts/eventNotification.js"></script>
	<?php
		require_once('generalFunc.php');
		$termTime=[// ['name'=>'','eventName'=>'', 'hourS'=>, 'minS'=>, 'hourE'=>,'minE'=>, 'place'=>'', 'class'=>''],  These events should be listed by the earliest
			//gym events
			['name'=>'演劇部','eventName'=>'演劇部公演', 'hourS'=>10, 'minS'=>30, 'hourE'=>11,'minE'=>20, 'place'=>'Gym', 'class'=>'act'],
			['name'=>'演劇部','eventName'=>'演劇部公演', 'hourS'=>14, 'minS'=>00, 'hourE'=>14,'minE'=>50, 'place'=>'Gym', 'class'=>'act'],
			//outside events
			['name'=>'吹奏楽部','eventName'=>'演奏会','hourS'=>11 , 'minS'=>20, 'hourE'=>12, 'minE'=>00, 'place'=>'Out', 'class'=>'brass'],
			['name'=>'吹奏楽部','eventName'=>'演奏会','hourS'=>14 , 'minS'=>50, 'hourE'=>15, 'minE'=>30, 'place'=>'Out', 'class'=>'brass'],
			//atrium events
			['name'=>'ダンス部','eventName'=>'ダンス部発表会','hourS'=>9 , 'minS'=>30, 'hourE'=>10, 'minE'=>20, 'place'=>'Atrium', 'class'=>'dance'],
			['name'=>'軽音楽部','eventName'=>'軽音楽部ライブ','hourS'=>11 , 'minS'=>30, 'hourE'=>12, 'minE'=>50, 'place'=>'Atrium', 'class'=>'band'],
			['name'=>'ダンス部','eventName'=>'ダンス部発表会','hourS'=>13 , 'minS'=>00, 'hourE'=>13, 'minE'=>50, 'place'=>'Atrium', 'class'=>'dance'],
			['name'=>'有志','eventName'=>'異装コンテスト','hourS'=>14 , 'minS'=>00, 'hourE'=>15, 'minE'=>30, 'place'=>'Atrium', 'class'=>'disguise']
		];
		$placeNames=[
			'Gym'=>'体育館', 
			'Out'=>'屋外-中学棟前',
			'Atrium' => '高校棟-アトリウム'
		];
		//
		$nowM = date("i")+ (date("H")*60);
		// $nowM=780;
		//
		$tGymMsg="Available Ticket";
		$sGymMsg="End Time";
		//
		$tOutMsg="Available Ticket";
		$sOutMsg="End Time";
		//
		$tAtriumMsg="Available Ticket";
		$sAtriumMsg="End Time";
		//
		$tOtherMsg="OtherMessage";
		$sOtherMsg="subMessage";
		//	
		$cGym ="none";
		$cOut ="none";
		$cAtrium ="none";
		$cOther = "none";
		//
		?>
	</head>

<body id="client">
	<?php
	if(checkEventDate()){
		foreach($termTime as $value){ // change the contents according the hour
			$sMin=($value['hourS']*60) +$value['minS'];
			$eMin=($value['hourE']*60) +$value['minE'];
			$enterTM='t'.$value['place']."Msg";
			$enterSM='s'.$value['place']."Msg";
			$enterC='c'.$value['place'];

			$encodedMinS =0;
			$encodedMinE =0;

			if($value['minS']==0){
				$encodedMinS="00";
			} else {
				$encodedMinS= $value['minS'];
			}

			if($value['minE']==0){
				$encodedMinE="00";
			} else {
				$encodedMinE= $value['minE'];
			}

			if($sMin <= $nowM && $nowM <= $eMin){
				$$enterTM = "Now : ". $value['eventName']." by ".$value['name'];
				$$enterSM = "@".$placeNames[$value['place']]." | ".$value['hourS'].":".$encodedMinS."~".$value['hourE'].":".$encodedMinE;
				$$enterC = $value['class'];
			} else if($$enterC=="none" && $nowM <= $sMin){
				$$enterTM = "Next UP : ".$value['eventName']." by ".$value['name'];
				$$enterSM ="@".$placeNames[$value['place']]." | ". $value['hourS'].":".$encodedMinS."~".$value['hourE'].":".$encodedMinE;
				$$enterC = $value['class'];
			} 
		}
		unset($value);
		if($cGym=="none"&&$cOut=="none"&&$cAtrium=="none"){
			$cOther="other";
			$tOtherMsg="イベントは全て終了しました";
			$sOtherMsg="ありがとうございました";
		}
	} else {
		$cOther = "other";
		$tOtherMsg="ここにイベント情報が表示されます";
		$sOtherMsg="時間に応じてリアルタイムに変化します";
	}
	?>
	<div class="<?php echo $cGym?>" id="gym"> 
		<div class="gymB background">
			<div>
				<h2><?php echo $tGymMsg?></h2>
				<p><?php echo $sGymMsg?></p>
			</div>
		</div>
	</div>
	<div class="<?php echo $cOut?>" id="out">
		<div class="outB background">
			<div>
				<h2><?php echo $tOutMsg?></h2>
				<p><?php echo $sOutMsg?></p>
			</div>
		</div>
	</div>
	<div class="<?php echo $cAtrium?>" id="atrium">
		<div class="atrB background">
			<div>
				<h2><?php echo $tAtriumMsg?></h2>
				<p><?php echo $sAtriumMsg?></p>
			</div>
		</div>
	</div>
	<div class="<?php echo $cOther?>" id="other">
		<div>
			<h2><?php echo $tOtherMsg?></h2>
			<p><?php echo $sOtherMsg?></p>
		</div>
	</div>
</body>
</html>
