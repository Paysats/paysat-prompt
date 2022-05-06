<?php 
$phone=$_POST["phone"];
?>
<html>
<head>
  <script type="text/javascript" src="js/edit.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300&family=Righteous&family=Zen+Kurenaido&family=Zen+Old+Mincho&display=swap" rel="stylesheet"> 
  <script type="text/javascript" src="js/airtime.js"></script>
</head>
<body>
<div id="airtime_body">


<span class="div_title">
<?php
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$id_gen='Airtime-';
$file = 'id_generate.txt';
$uniq = file_get_contents($file);
$letter1 = chr(65 + rand(0, 25));
$letter = chr(65 + rand(0, 25));
$id = $uniq + 3 ;
file_put_contents($file, $id);
$id_gen=$id_gen.$letter.$letter1.$id;
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$network="";
$network_code="";
/*
<option value="">--select network</option>
<option value="04">Airtel NG</option>
<option value="03">Etisalat NG</option>
<option value="02">Glo NG</option>
<option value="01">MTN NG</option>
 */
$check_phone =substr($phone,0,4);
if ($check_phone=="0803" ||$check_phone=="0703" ||$check_phone=="0903" ||$check_phone=="0806" ||$check_phone=="0706" ||
    $check_phone=="0813" ||$check_phone=="0814" ||$check_phone=="0816" ||$check_phone=="0810" ||$check_phone=="0906" ||
    $check_phone=="0704"){
        $network="MTN AIRTIME";
        $network_code="01";
}elseif ($check_phone=="0805"||$check_phone=="0705"||$check_phone=="0905"||$check_phone=="0807"||$check_phone=="0815"||
    $check_phone=="0905"||$check_phone=="0811"){
        $network="GLO AIRTIME";
        $network_code="02";
}elseif ($check_phone=="0802"||$check_phone=="0902"||$check_phone=="0701"||$check_phone=="0808"||$check_phone=="0708"||
    $check_phone=="0812"||$check_phone=="0901"){
        $network="AIRTEL AIRTIME";
        $network_code="04";
}elseif($check_phone=="0809"||$check_phone=="0909"||$check_phone=="0817"||$check_phone=="0818"||$check_phone=="0908"){
    $network="9MOBILE AIRTIME";
    $network_code="03";
}

echo $network;
?>
</span>
<div id="div_airtime_cover">
<table id="tb_airtime">
<tr><td id="td_icon"><?php get_img($network)?></td><td id="td_phone"><?php echo $phone?></td><td id="td_edit"><img alt="" src="pix/edit_icon.png" id="edit_num"></td></tr>
</table>
</div>
<input type="number" id="airtime_amount" placeholder="amount from 50 NGN to 10,000 NGN">
<input type="submit" value="Proceed" id="btn_proceed">
</div>
<form action="" method="post" id="frm_buy_airtime">
<input type="hidden" value="<?php echo $id_gen?>" name="id">
<input type="hidden" value="<?php echo $network_code?>" name="network_code">
<input type="hidden" value="<?php echo $network?>" name="network_title">
<input type="hidden" value="<?php echo $phone?>" name="phone">
<input type="hidden" id="txt_hold_amount"  name="amount">
</form>
</body>
</html>
<?php //id 	amount 	network 	status 	
function get_img($network){
    
    if ($network=="MTN AIRTIME"){
        echo '<img alt="" src="pix/mtn.png" class="network_logo">';
    }else if ($network=="GLO AIRTIME"){
        echo '<img alt="" src="pix/glo.png" class="network_logo">';
    }else if ($network=="AIRTEL AIRTIME"){
        echo '<img alt="" src="pix/airtel.png" class="network_logo">';
    }else if ($network=="9MOBILE AIRTIME"){
        echo '<img alt="" src="pix/etisalat.png" class="network_logo">';
    }
}
?>