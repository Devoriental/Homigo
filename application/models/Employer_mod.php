<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employer_mod extends CI_Model {

	
	function  check_email($cat_id='',$start='',$end=''){
		$msg="";
		if($_POST['email']=='')
			$msg="Invalid Email Address<br>";	
		elseif($_REQUEST['email']!=$_REQUEST['con_email'])
			$msg.="Email and Confirm Email did not match.<br>";

			$sql="select * from company where email='$_POST[email]'";
			$query=$this->db->query($sql);
			$ru=$query->row_array();
			if(count($ru)>0)
			$msg.="This Email Address exists in our records.Please choose another one.<br>";

		return $msg;	
	}

	function  check_existing_email($email,$id){
		$msg="";
		$sql="select * from company where email='$email' and company_id!=$id";
		$query=$this->db->query($sql);
		$ru=$query->row_array();
		if(count($ru)>0)
		$msg.="This Email Address exists in our records.Please choose another one.<br>";

		return $msg;	
	}
	
	function  check_password($p='',$r=''){
		$msg="";
		if($p=='')
			$msg="You did not enter password.<br>";	
		elseif($p!=$r)
			$msg.="Password and Re-type Password did not match.<br>";
		return $msg;	
	}

	function  check_date($y='',$m='',$d='',$parity){
		$msg="";
		if($y=='Year')
			$msg.="Please select year in ".$parity.".<br>";	
		if($m=='Month')
			$msg.=" Please select month in ".$parity.".<br>";	
		if($d=='Day')
			$msg.=" Please select day in ".$parity.".<br>";			
		return $msg;	
	}

	function  check_phone_number($phone,$parity){
		if (ctype_digit($phone)) 
        	return "";
    	 else 
        	 return "The is not a valid $parity number.\n";
    }		
	

		
}
?>