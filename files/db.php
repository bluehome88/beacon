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
 
class Db  {
   function connect() {
       $connect      = mysql_connect(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD);
	   $select_db    = mysql_select_db (MYSQL_DATABASE, $connect); 
		if (!$connect) {
		   $errno  = mysql_errno();
		   switch($errno) {
		      case 1045 : { $this->error(); break; }
		    }
		}
		elseif(!$select_db) {$this->error(); break;}
		$strSQL = "SELECT * from ".USERS_TABLE_NAME." limit 1";
        $result = mysql_query ($strSQL); 
		if($result==null) {
		   $this->create_table();
		   die();
		}
    }
    function check_set() {
     $field_array    = $this->get_table_fields();
	 $form_fieldname = explode(",",$_POST['fields'][0]);
	 for ($i = 0; $i < count($form_fieldname); $i++)  {
	   $form_field   = $form_fieldname[$i];
	   if(!strstr($form_field,"#")) {
	     $this->search_add($form_field, $field_array);
	   }
	 }
   }
   function get_table_fields() {
      $fields  = mysql_list_fields(MYSQL_DATABASE, USERS_TABLE_NAME);
      $columns = mysql_num_fields($fields);
      for ($i = 0; $i < $columns; $i++)  {
	     $field_array[] = mysql_field_name($fields, $i);
      }
	  return $field_array;
   }
   function field_exist($fieldname_to_search, $field_array ) {
     $search = str_replace('"',"",$fieldname_to_search);
	 if (!in_array(trim($search), $field_array)) {
	   return false;
     }
	 return true;
   }
   function search_add($fieldname_to_search, $field_array ) {
     $search = str_replace('"',"",$fieldname_to_search);
	 if (!in_array(trim($search), $field_array)) {
		$result = mysql_query("ALTER TABLE ".MYSQL_DATABASE.".".USERS_TABLE_NAME.
		          " ADD COLUMN ".str_replace('"',"`",$fieldname_to_search)." VARCHAR(200) NULL DEFAULT null;");
     }
   }
   function error() {
        echo "<div style='width:350;margin:auto;text-align:center;font-family:Arial'>
			     <span style='font-size:15px;color:red'>MYSQL SERVER ERROR : ".mysql_error()."</span> 	
			  </div>";
		echo "<div style='width:350;margin:auto;text-align:center;margin-top:10px;font-family:Arial'>
				 You must edit first the <b>config.php</b> file and input your correct MySQL account, this file 
				 is located under this <b>register</b> folder.
				 <p>Note: if  the database TABLE doesn't exist this module will automatically create one.</p>
				 <p>After done editing the config.php try to refresh this page</p>.
			  </div>";	  
	    die();
   }
   function create_table() {
      $strSQL = "CREATE TABLE `".USERS_TABLE_NAME."` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `username` varchar(200) NOT NULL DEFAULT '',
				  `password` varchar(200) DEFAULT NULL,
				  `email` varchar(200) DEFAULT NULL,
				  `fname` varchar(200) NOT NULL DEFAULT '',
				  `lname` varchar(200) NOT NULL DEFAULT '',
				  `gender` int(11) DEFAULT '1',
				  `street` varchar(200) DEFAULT NULL,
				  `city` varchar(255) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				)ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1; 
	            ";
      $result = mysql_query ($strSQL); 
	  echo ('<meta http-equiv="refresh" content="0;">');
   }
	 
	  
 }  
?>  
