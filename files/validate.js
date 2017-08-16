/**
 * Validate 
 * A  plugin to simply validate form fields
 *
 * Version 1.0.0.0
 * January 2009
 *
 * Copyright (c) 2009 Christopher M. Natan
 * Dual licensed under the MIT and GPL licenses.
 *
 **/
;(function($) { 
   var img_e    = "wp-content/themes/beacon/images/red_cancle.png";
   var img_c    = "wp-content/themes/beacon/files/green_right.png";
   var img_h    = "";
   var cls      = new Array(10);
   cls[0]       = 'validate_blank';
   cls[1]       = 'validate_email';
   cls[2]       = 'validate_username';
   cls[3]       = 'validate_password';
   cls[4]       = 'validate_password_confirm';
   cls[5]       = 'validate_visa';
   cls[6]       = 'validate_agree';
   
   $.fn.validate = function() {
	   	   		
		for (var i=0; i<cls.length; i++) {
			 var name   = cls[i];
			 var cl     = $('.'+name);
		 	$(cl).bind('blur', function() {check(this);});$(cl).bind('keypress', function(){check(this);});
			$(cl).bind('change', function(){check(this);});
		 }
		return this;
	};
	 
	
	$.fn.valid = function() {
		return validcheck();
    };
	function validcheck() {
       for (var i=0; i<cls.length; i++) {
			 var name     = cls[i];
			 var cl     = $('.'+name);
			 for (var x=0; x<cl.length; x++)
			 { check(cl[x]); }
	   }
	   var detect  = $().find(".validate-error-e");
	   if(detect.length==0) { return true;}
	  
	   return false;
	}
	function check(e) { 
	    var temp     = e.className;
		var splits   = temp.split(' ');
        var name     = splits[0];
			 
		var rnd  = Math.round(Math.random() * 9999999999);
		if(!e.id) {  $(e).attr("id","validate_"+rnd); } 
		switch(name) {
			case cls[0]:{validate_blank(e);break;  } 
			case cls[1]:{validate_email(e);break;}
			case cls[2]:{validate_username(e);break;}
			case cls[3]:{validate_password(e);break;}
			case cls[4]:{validate_password_confirm(e);break;}
			case cls[5]:{validate_visa(e);break;}
			case cls[6]:{validate_agree(e);break;}
		}
	};
	
	function add(e){ html(e,'e');return true;};
	function del(e){ html(e,'c');return false;};
	function html(e,t) {
	  var tl   = e.title;
	  var h    = '';
	  var help = "<span style='padding-left:5px;'><a href='#' class='help' title='"+tl+"'>";
	  help = help + "<img src='"+img_h+"' border=0/></a></span>";
	  if(t=='e'){
		 img = img_e;
		 $("#"+e.id).css("background","#F00");
		 $("#"+e.id).css("color","#FFF");
	  } 
	  else {img = img_c;
	  $("#"+e.id).css("background","#FFF");
	  $("#"+e.id).css("color","#000");
	  }	
	  
	 
	  
	  var classe = "class='validate-error-"+t+"'";
	  $("#s"+e.id).remove();
	  
	  $("#"+e.id).after("<span id='s"+e.id+"'"+classe+"style='padding-left:5px;'><img src='"+img+"'/></span>"+h);   
      $("#"+e.id).fadeIn("slow");
	}
    function validate_blank(e) {
	   if(e.value.length==0 || e.value==0) {
	     return add(e);}
	   else
	   { return del(e);}		   
	};
	function validate_email(e) {
	  var emailfmt= /^\w+([.-]\w+)*@\w+([.-]\w+)*\.\w{2,8}$/;
	  if(!emailfmt.test(e.value) || e.value.length==0) {
	     return add(e);}
	  else
	  { return del(e);}			    
	};
	function validate_username(e) {
		var min = MINIMUM_USERNAME;
        var len = e.value.length;
		if(len < min || e.value.length==0)
		{ return add(e);}
		else
		{ return del(e);}		    
	};
	function validate_password(e) {
		var min = MINIMUM_PASSWORD;
        var len = e.value.length;
		if(len < min || e.value.length==0)
		{ return add(e);}
		else
		{ return del(e);}		    
	};
	function validate_password_confirm(e) {
		var p = $('.validate_password').val();
		if(p != e.value || e.value.length==0)
		{ return add(e);}
		else
		{ return del(e);}		    
	};
	function validate_visa(e){
	  var val = e.value;
	  if(val.length==16 && !isNaN(val)){ 
         return del(e); 
	  }
	  if(val.length==0){return add(e);}
	  else if(val.length<16 || isNaN(val)){ 
         return add(e);
	  }
	  else if(val.length>16 || isNaN(val)){ 
         return add(e); 
	  }
	};
	function validate_agree(e) {
		if(!e.checked)
		{return add(e);}
		else
		{ return del(e);}		    
	};

   
})(jQuery);

