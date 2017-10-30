<?php
/* 
Author: Avijit Sen 
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_mod extends CI_Model {

	
	/* function  get_event_thismonth(){
		$sql="select  * from event where MONTH(CURDATE())=MONTH(event_date) and status='active' order by event_date ";
		$query=$this->db->query($sql);
		return $query->result_array();
	} */
	function  get_event_list(){
			
			$sql="select  * from event where  MONTH(CURDATE())=MONTH(event_date) or event_date>=CURDATE() and status='active' order by event_date ";			
			$query=$this->db->query($sql);
			return $query->result_array();
	}
	
	function check_field(){
		if($_REQUEST['username']=='')
			$err[]="Please specify full name";
		else{
			if($this->valid_username($_REQUEST['username'])==FALSE)
				$err[]="Invalid Username";	
		}
		
		if($_REQUEST['email']=='')
			$err[]="Invalid Email Address";	
		else{
			if($this->valid_email($_REQUEST['email'])==FALSE)
				$err[]="Invalid Email Address";	
			else{
				$sql="select * from user where email='$_REQUEST[email]'";
				$query=$this->db->query($sql);
				$ru=$query->row_array();
				if(count($ru)>0)
				$err[]="This Email Address exists in our records.Please choose another one.";
			}	
		}	
		if($_REQUEST['password1']=='')
			$err[]="Password is required";		
		else{
			if($this->valid_password($_REQUEST['password1'])==FALSE)
				$err[]="Invalid Password";	
			elseif($_REQUEST['password1']!=$_REQUEST['password2'])
				$err[]="Password and Retype Password is not matched";		
		}
		return $err;	
	}
	/* function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}
	function valid_username($str)
	{
		return ( ! preg_match("/^([a-z0-9\_\-\s]+)$/ix", $str)) ? FALSE : TRUE;
	}
	function valid_password($str)
	{
		return ( ! preg_match("/^([a-z0-9\_\-]+)$/ix", $str)) ? FALSE : TRUE;
	}
	function insert_info(){
		$ip=getenv('REMOTE_ADDR');
		$sql="insert into user set username='$_REQUEST[username]',email='$_REQUEST[email]',
							password='$_REQUEST[password1]',country='$_REQUEST[country]',
								regdate=now(),ip='$ip',status=1";
		$this->db->query($sql);
		$uid=$this->db->insert_id();
		$this->session->set_userdata('username', $_REQUEST[username]);
		$this->session->set_userdata('password', $_REQUEST[password1]);
		$this->session->set_userdata('uid', $uid);		
	} */
}
?>