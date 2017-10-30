<?php
/*
Author: Avijit Sen
*/
class Bosslog_stats extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_mod');
		$this->load->helper('form');
	}
	/* function Home ()
	{
	     parent::Controller();
		 $this->load->model('home_mod');
		 
	} */
	function index()
	{
	
		 
		
	}
	
	
	function applieduser($curpage=1)
	{
	
		$data['msg']="";
		$data['user_list']='';
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			$tsql="SELECT user_id, count( user_id ) AS total_apply FROM job_apply GROUP BY (user_id) ORDER BY total_apply DESC";
			$query=$this->db->query($tsql);
			$data['totalrow']=$totalrow=$query->num_rows(); 

			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='total_apply';
			if($curpage=='')$curpage=1;
			$limit_per_page=50;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="SELECT a.user_id, b.user_name,b.email, count( a.user_id ) AS total_apply
							FROM job_apply AS a, user AS b
							WHERE a.user_id = b.user_id
							GROUP BY (a.user_id)
							ORDER BY total_apply DESC
							LIMIT $start,$limit_per_page";
			$qry=$this->db->query($sql);	
			$data['user_list']=$qry->result_array();			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['total_page']=$total_page;
		$data['currentpage']=$curpage;
		$data['title']=" Insert Job";
		$this->load->view('admin/applieduser',$data); 		
	}

	function numjobs_percompany($curpage=1){
		$data['msg']="";
		$data['user_list']='';
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			$tsql="SELECT company_id, count( company_id ) AS total_jobs FROM job_list GROUP BY (company_id) ORDER BY total_jobs DESC";
			$query=$this->db->query($tsql);
			$data['totalrow']=$totalrow=$query->num_rows(); 

			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='total_apply';
			if($curpage=='')$curpage=1;
			$limit_per_page=50;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="SELECT company_id, count( company_id ) AS total_jobs FROM job_list GROUP BY (company_id) ORDER BY total_jobs 	DESC LIMIT $start,$limit_per_page";
			$qry=$this->db->query($sql);	
			$data['num_per_jobs']=$qry->result_array();			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['total_page']=$total_page;
		$data['currentpage']=$curpage;
		$data['title']=" Insert Job";
		$this->load->view('admin/numjobs_percompany',$data); 	
	}
	
	
}
?>
