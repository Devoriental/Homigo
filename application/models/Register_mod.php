<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_mod extends CI_Model {

	
	function  check_empty_field($thefield,$parity){
		$msg="";
		if($thefield=='')
			$msg.="Please fill up your ".$parity.".<br>";	
		
		return $msg;		
    }

	function  check_email($cat_id='',$start='',$end=''){
		$msg="";
		if($_POST['email']=='')
			$msg="Invalid Email Address<br>";	
		elseif($_REQUEST['email']!=$_REQUEST['con_email'])
			$msg.="Email and Confirm Email did not match.<br>";

			$sql="select * from user where email='$_POST[email]'";
			$query=$this->db->query($sql);
			$ru=$query->row_array();
			if(count($ru)>0)
			$msg.="This Email Address exists in our records.Please choose another one.<br>";

		return $msg;	
	}

	function  check_username($uname=''){ 
		$nuname="->".$uname;
		$msg=""; 
		$sql="select * from user where access_id='$uname'";
		$query=$this->db->query($sql);
		$ru=$query->row_array();
		if(count($ru)>0){
			$msg.="The username name is not available.Please try a different one.<br>";
		}
		elseif ($this->check_space($nuname)=='yes'){
			$msg.="Space is not allowed in username.<br>";
		}
		elseif ($this->check_comma($nuname)=='yes'){
			$msg.="Comma is not allowed in username.<br>";
		}

		return $msg;
		
	}

	function  check_existing_email($email,$id){
		$msg="";
		$sql="select * from user where email='$email' and user_id!=$id";
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
		elseif(strlen($p)<6) 
			$msg.="Password must be minimum 6 characters.<br>";
		elseif ($this->check_space('->'.$p)=='yes')
			$msg.="Space is not allowed in password.<br>";
		elseif ($this->check_comma('->'.$p)=='yes')
			$msg.="Comma is not allowed in password.<br>";
		
			
		return $msg;	
	}

	function  check_date($y='',$m='',$d='',$parity){
		$msg="";
		if($y=='Year')
			$msg.=" Please select year in ".$parity.".<br>";	
		if($m=='Month')
			$msg.=" Please select month in ".$parity.".<br>";	
		if($d=='Day')
			$msg.=" Please select day in ".$parity.".<br>";		
		return $msg;	
	}

	function  check_phone_number($phone,$parity){
		$msg='';
		if (ctype_digit($phone)) {
        	if (strlen($phone)!=11) {
        		 $msg=" Invalid phone number.<br>";        	
        	}
        }
        else 
        	 $msg="This is not a valid $parity number.<br>";

        return $msg;	
    }

	function  check_national_id($national_id,$parity){
		$msg='';
		if (ctype_digit($national_id)) {
        	$msg='';
        }
        else 
        	 $msg="This is not a valid $parity number.<br>";

        return $msg;	
    }
    function  check_space($theword){
		
		$pos=strpos($theword,' ');
		if($pos>0) { return 'yes'; }
		else
			return 'no';
		
    }
    function  check_comma($theword){
		
		$ret='no';
		$pos=strpos($theword,"'");
		if($pos>0) {$ret='yes'; }
		$pos=strpos($theword,'"');
		if($pos>0) {$ret='yes'; }
		
		return $ret;
    }			
	
	

		
}
?>