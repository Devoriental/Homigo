<?php
/*
Author: Avijit Sen
*/
class Tips extends CI_Controller
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
		
	}
	
	function listoftips($curpage=1){
	
		//$data['categorylist']=$sarr=$this->common->get_table_data(0,'job_category',''," order by job_category_id asc");
		//$data['hot_jobs']=$sarr=$this->common->get_table_data(0,'job_list'," where status='active' and hot_job='yes'"," order by rand()");
		//print_r($data['hot_jobs']);
		$data['msg']="";	
			
		$qry=$this->db->query("select count(*) as total from tips where status='active'");
		$arr=$qry->row_array();
		$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='tips_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=15;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from tips where status='active'  order by $order $sort limit $start,$limit_per_page ";
			$qry=$this->db->query($sql);	
			$data['tip_list']=$qry->result_array();
			
			//print_r($data['infolist']);
			$data['title']="Job List";
			$data['description']="All job list";
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;	
		
		$this->load->view('tips/listoftips',$data); 
	
	}

	function detail($tips_id=1)
	{		
		
			$isql="select * from tips where status='active' and tips_id=$tips_id";
			$iry=$this->db->query($isql);
			$data['tips']=$trr=$iry->row_array();		
		
			$data['title']=$data['tips']['tips_title'];
			$data['description']="By ".$data['tips']['writer'];
			$this->load->view('tips/detail',$data); 
	}
}
?>
