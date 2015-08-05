      jQuery(function($){
	    
	    
	    
	    $('.step1 button').click(function(){
		  
		  if ( !$('#idea').val()) {
			alert('Tell us your idea/feedback');
		  }
		  
		  else if ($('#agree').prop('checked') == false) {
			alert('Please Agree to Terms & Condition');
		  }
		  else {
                        var data = 'action=save_first_page&content='+ $('#idea').val();
                        
                        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
                        $.post(ajax_object.ajax_url, data, function(response) {
                                if ( response.stt == 'success') {
                                    //alert(response.msg);
                                }
                                else if (response.stt == 'error') {
                                    //alert( response.msg );
                                }
                                
                        });
                        
                        
                        $('#innovation').val( $('#idea').val()  );
			$('.step1').hide();
			$('.step2').show();
		  }
		  return false;
	    });
	    
	    $('#bus').bind('click', function(){
		  if ( $(this).is(":checked")) {
			$('#business').show();
			$('#customer').hide();
			$('.btn_submit').show();
		  }
		  else {
			$('#business').hide();
		  }
		  
	    });
	    
	    $('#cus').bind('click', function(){
		  if ( $(this).is(":checked")) {
			$('#business').hide();
			$('#customer').show();
			$('.btn_submit').show();
		  }
		  else {
			$('#customer').hide();
		  }
	    });
	    
	    
	    $('#finished').bind('click', function(){
		  
		  if ( !$('#innovation').val()) {
			alert('Enter innovation idea details');
			
		  }
		  
		  else if ( !$('#name').val()) {
			alert('Enter your name');
			
		  }
		  
		  else if ( !$('#email').val()) {
			alert('Enter your email');
			
		  }
		//  else if (idea_form.email.value.search(/^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/) ==-1)
        //	{
          //      alert ("Email is in an invalid format.");
          //      valid = false;
        	//}
        	
           else {
                        var data = 'action=save_second_page&'+ $('#ideation_hub').serialize();
                        
                        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
                        $.post(ajax_object.ajax_url, data, function(response) {
                                if ( response.stt == 'success') {
                                    alert(response.msg);
                                    window.location.href= response.redirecturl;
                                }
                                else if (response.stt == 'error') {
                                    alert( response.msg );
                                }
                                
                        });
                  }
		  
		  return false;
		 
	    })
	    
      });