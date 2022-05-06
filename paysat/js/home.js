$(document).ready(function () {
var bd_width=$("#pix_logo").width();
var pix_hieght=$("#pix_logo").height();
var service_parent=$("#pix_logo").width();
bd_width=bd_width-30;
service_parent=service_parent-20;
service_parent=service_parent+"px";
pix_hieght=pix_hieght+"px"
$("#noti").css("width",bd_width);
$("#div_airtime").css("width",service_parent);
$(".div_title").css("width",service_parent);
$("#div_return_check_phone").css("width",service_parent);

$("#div_data").css("width",service_parent);
$(".div_title").css("width",service_parent);
$("#div_return_check_phone_data").css("width",service_parent);

$("#btn_electri").click(function () {
            $("#noti").html("Coming soon");
         $("#noti").slideToggle();
                  setTimeout(function() {
$("#noti").slideToggle();
  }, 2000);
})

    $("#btn_cable_sub").click(function () {
          $("#noti").html("Coming soon");
         $("#noti").slideToggle();
                  setTimeout(function() {
$("#noti").slideToggle();
  }, 2000);
    })
$("#btn_airtime").click(function () {
       $("#div_airtime").slideToggle();
       $("#div_return_check_phone").hide();
})
    $("#btn_data").click(function () {
       $("#div_data").slideToggle();
       $("#div_return_check_phone_data").hide();
})
    $("#btn_close_airtime").click(function () {
        $("#div_airtime").slideToggle();
    })
    
    $("#phone_no").keyup(function (e) {
        e.preventDefault();
       var lng=$(this).val();
       $("#txt_phone").val($(this).val());
        if (lng.length=="11"){
            airtime();
        }
    })
        $("#phone_no_data").keyup(function (e) {
        e.preventDefault();
       var lng=$(this).val();
       $("#txt_phone").val($(this).val());
        if (lng.length=="11"){
            data();
        }
    })
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            function data(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "data.php",
            method: "post",
           data: $('#frm_check_phone').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
$("#div_return_check_phone_data").html(strMessage);
 $("#div_return_check_phone_data").slideToggle();
            }
        })
    }
            function airtime(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "airtime.php",
            method: "post",
           data: $('#frm_check_phone').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
$("#div_return_check_phone").html(strMessage);
 $("#div_return_check_phone").slideToggle();
            }
        })
    }

})