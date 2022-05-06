<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css" type="text/css">
   <link rel="stylesheet" href="css/process.css" type="text/css">
  <script type="text/javascript" src="js/lab.js"></script>
   <script type="text/javascript" src="js/home.js"></script>
    <script type="text/javascript" src="js/edit.js"></script>
   <style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300&family=Zen+Kurenaido&family=Zen+Old+Mincho&display=swap" rel="stylesheet"> 
<script type="text/javascript"  src="js/notii.js">

</script>
</head>
<body>
<div id="divbg">
<img alt="" src="" id="pix_bg">
</div>
<img alt="" src="pix/pays.png" id="pix_logo">
<div id="div_login">
<input type="submit" value="Airtime"  class="ttx_in" id="btn_airtime">
<input type="submit" value="Data Plan"  class="ttx_in" id="btn_data">
<input type="submit" value="Cable sub"  class="ttx_in" id="btn_cable_sub">
<input type="submit" value="Electricity"  class="ttx_in" id="btn_electri">
</div>


<div id="div_processing">
<div id="div_pro_posi">
<div class="loader"></div>

</div>
Please wait
</div>

<div id="noti">
success
</div>
<div id="div_airtime">
<div class="div_title" id="btn_close_airtime">
<img alt="" src="pix/back.svg" class="back_button">
Airtime</div>
<div id="div_return_phone">
<span class="sp_phone_title">Enter a phone number to recharge</span><br>
<input type="number" id="phone_no" placeholder="070123456789">

</div>
<div id="div_return_check_phone">
dd
</div>
</div>

<div id="div_data">
<div class="div_title" id="btn_close_airtime">
<img alt="" src="pix/back.svg" class="back_button">
Data Plan</div>
<div id="div_return_phone_data">
<span class="sp_phone_title">Enter a phone number to recharge</span><br>
<input type="number" id="phone_no_data" placeholder="070123456789">

</div>
<div id="div_return_check_phone_data">
dd
</div>
</div>

<form action="" method="post" id="frm_check_phone">
<input type="hidden" id="txt_phone" name="phone">

</form>

<div id="div_foota">
<img alt="" src="pix/foota.jpg" id="foota_pix">
</div>

</body>
</html>