// 
//	jQuery Validate example script
//
//	Prepared by David Cochran
//	
//	Free for your use -- No warranties, no guarantees!
//

$(document).ready(function(){

	// Validate
	// http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	// http://docs.jquery.com/Plugins/Validation/
	// http://docs.jquery.com/Plugins/Validation/validate#toptions
	
		$('#contact-form').validate({
	    rules: {
			 question: {
	        required: true
	      },
		   occupation: {
	        required: true
	      },
		   lname: {
	        required: true
	      },
		   fname: {
	        required: true
	      },
	      name: {
	        minlength: 2,
	        required: true
	      },
	      email: {
	        required: true,
	        email: true
	      },
		   phone: {
	        required: true,
	        number: true
	      },
		   security_code: {
	        required: true,
	       },
	      subject: {
	      	
	        required: true
	      },
	      message: {
	        minlength: 2,
	        required: true
	      }
	    },
	    highlight: function(label) {
	    	$(label).closest('.control-group').addClass('error');
	    },
	    success: function(label) {
	    	/*if((label.text('OK!').hasClass('error')))
			{
				if(label.text('OK!').hasClass('valid'))
				{
					alert('in the valid class');
					label.removeClass('error');
				}
				else
				{
					label
						.text('OK!').addClass('valid')
						.text('OK!').removeClass('error')
						.closest('.control-group').addClass('success');
				}
			}
			else
			{
				label
					.text('OK!').addClass('valid')
					.closest('.control-group').addClass('success');
			}*/
			label
					.text('OK!').addClass('valid')
					.closest('.control-group').addClass('success'); 
	    }
	  }); 
	  
}); // end document.ready