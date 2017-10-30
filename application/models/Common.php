<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		Avijit Sen
 * @copyright	Copyright (c) 2006, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

class Common extends CI_Model {

	function get_table_data($row=1,$table,$where='', $sort='',$limit=''){
		$sql="select * from $table $where $sort $limit";
		$query=$this->db->query($sql);
		if($row==1)
			return $query->row_array();
		else	
			return $query->result_array();
	}
	
	/* function is_login($is_redirect='')
	{
		$username=$this->session->userdata('username');
		$password=$this->session->userdata('password');
		
		if($username==''&&$password=='')
		{ 
			if($is_redirect==1)
			{
				redirect('account/login.html');
			}
			return false;
		}
		else
		{
			$query = $this->db->get_where('user',array('username' => $username,'password' => $password));
			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				if($is_redirect==1)
					redirect('account/login.html');
				return false;
			}
		}
	}
	
	function is_admin_login($is_redirect='')
	{
		$username=$this->session->userdata('admin_username');
		$password=$this->session->userdata('admin_password');
		
		if($username==''&&$password=='')
		{
			if($is_redirect==1)
				redirect('admin/login.html');
			return false;
		}
		else
		{
			$query = $this->db->get_where('admin',array('username' => $username,'password' => $password));
			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				if($is_redirect==1)
					redirect('siteadmin/index.html');
				return false;
			}
		}
	}
	
	function config($key)
	{
		$query=$this->db->get_where("setting",array('title'=>$key));
		$arr=$query->row_array();
		return $arr['description'];
	}
	
	function countdown($time)
	{
		$ctime = $time-time();
		$hour = (int)($ctime / (60*60));
		$mhour = $ctime % (60*60);
		$min = (int)($mhour / 60);
		$sec= $mhour % 60;
		return sprintf('%02d',$hour).':'.sprintf('%02d',$min).':'.sprintf('%02d',$sec);
	} */
	
	
}

?>