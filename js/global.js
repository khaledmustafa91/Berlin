$(window).on("load", function(){
		setTimeout(function(){
			$(".loader").css("display", "none")
		}, 1000);

	});
 /*
  **********************************************************
  * OPAQUE NAVBAR SCRIPT
  **********************************************************
  */

  // Toggle tranparent navbar when the user scrolls the page

  $(window).scroll(function() {
    if($(this).scrollTop() > 40)  /*height in pixels when the navbar becomes non opaque*/ 
    {
        $('.navbar').addClass('navbar-fixed-top');
    } else {
        $('.navbar').removeClass('navbar-fixed-top');
    }

});

function FORM() {
    "use strict";
    var spans = document.getElementsByTagName("span"),
        name = document.form.name,
        email = document.form.email,
        phone = document.form.phone;
    if(name.value == ""){
        spans[3].style.visibility = "visible";
    }
    else{
        spans[3].style.visibility = "hidden";
    }
    if(email.value == ""){
        spans[4].style.visibility = "visible";
    }
    else{
        spans[4].style.visibility = "hidden";
    }
    if(phone.value == ""){
        spans[5].style.visibility = "visible";
    }
    else{
        spans[5].style.visibility = "hidden";
    }

}