<?php
/*
Author: Avijit Sen
*/
class Resource extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_mod');
		//$this->load->library('cart');
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
	
	function listofresource($curpage=1){
	
		//$data['categorylist']=$sarr=$this->common->get_table_data(0,'job_category',''," order by job_category_id asc");
		//$data['hot_jobs']=$sarr=$this->common->get_table_data(0,'job_list'," where status='active' and hot_job='yes'"," order by rand()");
		//print_r($data['hot_jobs']);
		$data['msg']="";	
			
		$qry=$this->db->query("select count(*) as total from resource where status='active'");
		$arr=$qry->row_array();
		$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='resource_date';
			if($curpage=='')$curpage=1;
			$limit_per_page=15;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from resource where status='active'  order by $order $sort limit $start,$limit_per_page ";
			$qry=$this->db->query($sql);	
			$data['resource_list']=$qry->result_array();
			
			//print_r($data['infolist']);
			$data['title']="Resources & Articles";
			$data['description']="Resource &  Article List";
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;	
		
		$this->load->view('resource/listofresource',$data); 
	
	}

	function detail($resource_id=1)
	{		
		
			$isql="select * from resource where status='active' and resource_id=$resource_id";
			$iry=$this->db->query($isql);
			$data['resource']=$trr=$iry->row_array();
		//echo $trr['resource_file'];
		
			$data['title']=$data['resource']['resource_title'];
			$data['description']="By ".$data['resource']['writer'];
			$this->load->view('resource/detail',$data); 
	}
}
?>
