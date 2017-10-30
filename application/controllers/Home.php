<?php
/*
Author: Avijit Sen
*/
class Home extends CI_Controller
{ 
	public function __construct()
	{ 
		parent::__construct();				
		$this->load->model('home_mod');
		$this->load->library('cart');
		$this->load->helper('form');
		
	}
	/* function Home ()
	{
	     parent::Controller();
		 $this->load->model('home_mod');
		 
	} */
	function index()
	{  		

		$data['categorylist']=$sarr=$this->common->get_table_data(0,'tradesman_category',''," order by tradesman_category_id asc");
		$data['hot_jobs']=$sarr=$this->common->get_table_data(0,'job_list'," where status='active' and hot_job='yes' and curdate()<=last_date" ," order by rand()");
		//print_r($data['hot_jobs']);
		$data['msg']="";	
		
			$configarr=$this->common->get_table_data(1,'site_config'," where config_data='number_of_job_home'");
			$number_of_job_home=$configarr['config_value'];
			$qry=$this->db->query("select count(*) as total from job_list where curdate()<=last_date and status='active'");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='job_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=$number_of_job_home;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from job_list where status='active' and hot_job='no' and curdate()<=last_date order by $order $sort limit $start,$limit_per_page ";
			$qry=$this->db->query($sql);	
			$data['job_list']=$qry->result_array();
			//print_r($data['infolist']);
			$data['training_list']=$this->common->get_table_data(0,'training_list'," where status='active'");
			//print_r($data['training_list']);
			$isql="select * from interview where status='active' order by interview_date desc";
			$iry=$this->db->query($isql);
			$data['interviews']=$irr=$iry->row_array();
//print_r($irr);
			$data['resource']=$this->common->get_table_data(0,'resource'," where status='active'", ' order by rand()',' limit 0,2');
			//$data['tips']=$this->common->get_table_data(0,'tips'," where status='active'", ' order by tips_date',' limit 0,2');

			$data['totalrow']=$arr['total'];
			$data['title']="";
			$data['description']="";
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['limit_per_page']=$limit_per_page;
			$data['order']=$order;
			$data['sort']=$sort;	
		
		$this->load->view('home',$data); 

	}

	function ajax_email()
	{		
		$name=$_REQUEST['n'];
		$email=$_REQUEST['e'];
		$phone=$_REQUEST['p'];
		$company=$_REQUEST['c'];
		$subject=$_REQUEST['s'];		
		$message=$_REQUEST['m'];
		$message=$message."\n".$company."\n".$phone;

		$this->load->library('email');
		
		
		$this->email->from($email, $name);
		//$this->email->to('devoriental@yahoo.com');
		$this->email->to('write@journeymakerjobs.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();
		echo $msg="Email is sent";		
	}
	
	
}
?>
