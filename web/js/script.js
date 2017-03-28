









$(document).ready(function(){
	
	
	 $(function() {
      if (!$.cookie('smartCookies')) {
 
        function explode(){
 
 	 $("#form").show();
	}
 
        setTimeout (explode, 15000);
      }
 
      $.cookie('smartCookies', true, {
        expires: 180, 
        path: '/'
      });
 
    })
	
	
});
	
/*=======================================================================================*/

$(document).ready(function(){
	
	
	$( "#close" ).click(function() {
	$( "#form" ).hide();
	
 
});

});


/*=======================================================================================*/
$(document).mouseleave(function(e){
    if (e.clientY < 0) {
    
    }     
});
/*=======================================================================================*/



