(function ($) {
/*==========================================================================*/
        $('#news a').click(function(){

        $.ajax({  

        type: "GET",  

        url: "site/click",  

       	data: "id="+this.id  
  
	});
	 
	});
/*=======================================================================*/
        
         $('#news button').click(function(){

      $.ajax({  

        type: "GET",  

        url: "site/rating",  

       	data: "id="+this.id  
  
	});
	 location.reload();  
	});
        

       
  

})(window.jQuery);


