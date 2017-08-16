<?php
/**
 * Ajax Registration Module v1.1
 *
 * Ajax Registration Module is a simple AJAX registration page with ajax validation and easy to 
 * plug into your existing php application.
 *
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2009, Christopher M. Natan
 * @link          http://phpstring.co.cc/phpclasses/modules/ajax-registration-module/
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 */
 
 /* 
  * Main Configuration 
  * Im sure you will edit this section.
 */
  error_reporting(0);
 
  if($_SERVER['HTTP_HOST'] == 'localhost')
  {
	define('MYSQL_HOSTNAME',  'localhost');           /* hostname */
	define('MYSQL_USERNAME',  'root');                /* username */
	define('MYSQL_PASSWORD',  '');            		/* password */
	define('MYSQL_DATABASE',  'beacon');         	 /* database */
  }
  else
  {
	define('MYSQL_HOSTNAME',  'localhost');           /* hostname */
	define('MYSQL_USERNAME',  'betabeacon');                /* username */
	define('MYSQL_PASSWORD',  '8qKWCbR2NGqruQt');            		/* password */
	define('MYSQL_DATABASE',  'beacon');         	 /* database */  
  }
   
  
  
  /* if the USERS_TABLE_NAME doesn't exist in the DB then this module  will automatically create this TABLE  */
  define('USERS_TABLE_NAME','app_members');
  
  /* If registration successful then it will redirect to */
  define('SUCCESS_REGISTRATION_GOTO'   ,'registration_successful.php');
  
  /* If set to true - this module will get all fields from html form
   * then  will check the database table if those form fields are existing,
   * it will automatically create fieldnames in the database table if doesn't exist 
   */
  define('AUTOMATIC_CREATE_FIELDS_FROM_FORM'  , true);
  
  /* minimum character length for username and password */
  define('VALIDATION_MINIMUM_USERNAME_LENGTH'   ,6);
  define('VALIDATION_MINIMUM_PASSWORD_LENGTH'   ,6);
 
  
  
  
  
  
  
  
  
  
  
  /* Advance Configuration - no need to edit this section */
  define('AJAX_TIMEOUT',        '10000000');
  define('AJAX_TARGET_ELEMENT', 'ajax_target');
  define('AJAX_WAIT_TEXT',      'Please wait...');
  define('AJAX_FORM_ELEMENT',   'ajax_form');
  define('AJAX_WAIT_ELEMENT',   'ajax_wait');
  define('AJAX_NOTIFY_ELEMENT', 'ajax_notify');
  
  
  
  
           

?>