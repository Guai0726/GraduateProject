$(function() { 
    $(".flexslider").flexslider({
      animation: "fade",
      touch: true
     
    }); 
  }); 
  $(function(){
    $('#home').click(function() {      
      $('html,body').animate({scrollTop:$('#homen').offset().top}, "show");
                return false;
            });  
 });
$(function(){
    $('#about').click(function() {      
      $('html,body').animate({scrollTop:$('#aboutn').offset().top}, "show");
                return false;
            });  
 });
 $(function(){
    $("#game").click(function() {      
      $('html,body').animate({scrollTop:$("#gamen").offset().top}, "show");
                return false;
            });  
 });



 