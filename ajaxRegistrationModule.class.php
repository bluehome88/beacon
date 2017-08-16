<?php
/**
 * Ajax Registration Module v1.1
 *
 * Ajax Registration Module is a simple AJAX registration page that easy to 
 * plug into your existing php application.
 *
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2009, Christopher M. Natan
 * @email         chris.natan@gmail.com
 * @link          http://phpstring.co.cc/phpclasses/modules/ajax-registration-module/
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 
 */
 


include('files/db.php');
class ajaxRegistrationModule  {
  private $timeout         = null;
  private $target_element  = null;
  private $wait_text       = null;
  private $form_element    = null;
  private $wait_element    = null;
  private $notify_element  = null;
  private $mysql;
   
  function __construct() {
     include ('config.php'); 
	 $this->mysql  = new Db;
	 $this->mysql->connect();
	 $this->is_register();
  } 
  function get_config() {
	 $this->set_ajax_config();
  } 
  function set_ajax_config() {
     $this->timeout         = AJAX_TIMEOUT;
     $this->target_element  = AJAX_TARGET_ELEMENT;
     $this->wait_text       = AJAX_WAIT_TEXT;
	 $this->wait_element    = AJAX_WAIT_ELEMENT;
     $this->notify_element  = AJAX_NOTIFY_ELEMENT;
     $this->form_element    = AJAX_FORM_ELEMENT;
  }
  function initRegistration($arg = array()) {
	 $this->get_config();
	 $this->registration_script();   	 
  }
  function initScript() { 
	 echo "<script>var MINIMUM_PASSWORD = ".VALIDATION_MINIMUM_PASSWORD_LENGTH .";" ;
	 echo "var MINIMUM_USERNAME = ".VALIDATION_MINIMUM_USERNAME_LENGTH .";</script>" ;
	 $jquery   =  "<script type='text/javascript' src='wp-content/themes/beacon/files/jquery-1.3.2.min.js'></script>";
	 $validate =  "<script type='text/javascript' src='wp-content/themes/beacon/files/validate.js'></script>";
	 return $jquery . $validate;
	 //return $validate;
  }
  function registration_script() { 
	 include ('wp-content/themes/beacon/files/registration_script.php');
  }
  function is_register() {
	  if(count($_POST)>=2)  {
		$strSQL = " INSERT INTO ".USERS_TABLE_NAME." SET " . $this->get_set_fields();
		$result  = mysql_query ($strSQL); 
	    $this->jscript_location();
		exit;		
	  }
	   $this->check_formField();   
  }
  function check_formField() {
      if(isset($_POST['fields'])) {
         $this->mysql->check_set();
		 exit; 
	  }
  }
  function get_set_fields() {
      $array       = array();
	  $fields      = array_keys($_POST);
	  $field_array = $this->mysql->get_table_fields();
	  for ($i = 0; $i < count($fields); $i++)  {
		 $value    = $_POST["$fields[$i]"];
		 $exist    = $this->mysql->field_exist($fields[$i], $field_array );
		 if($exist) { 
		   $array[] = "`$fields[$i]`='$value'"; 
		 }
	  }
	  return implode(",",$array); 
  }
  function notify_show() {
    echo "<script>$('.".AJAX_NOTIFY_ELEMENT."').fadeIn();</script>";
  }
  function jscript_location() {
    $this->set_session();
    echo "<script> $('#post-493').fadeOut();window.location.href='".SUCCESS_REGISTRATION_GOTO."'</script>";
  }
  function set_session() {
      session_start();
	  $_SESSION['is_successful_registration'] = true;
  }  	 
	   
}  
?>  