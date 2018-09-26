alert("test");
  var email_sel = $("#enter_reg").val()="email_sel";
  var phone_sel = $("#enter_reg").val()="phone_sel";
  if(email_sel){
  	$("phone_reg").remove();
  } else if(phone_sel){
    $("email_reg").remove();
  }