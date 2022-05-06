$(document).ready(function () {
    var amount=0;
    $("#airtime_amount").keyup(function () {
   $("#txt_hold_amount").val($(this).val());
   amount=parseInt($(this).val());
    })

    $("#btn_proceed").click(function (e) {
        e.preventDefault();
if (amount<50){
    alert("ddxxx"+amount);
}else{
    airtime();
}
    })

        $("#btn_proceed_data").click(function (e) {
        e.preventDefault();
data();
    })
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
                function data(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "_data.php",
            method: "post",
           data: $('#frm_buy_airtime').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
$("#airtime_body").html(strMessage);

            }
        })
    }
                function airtime(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "_airtime.php",
            method: "post",
           data: $('#frm_buy_airtime').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
$("#airtime_body").html(strMessage);

            }
        })
    }
})