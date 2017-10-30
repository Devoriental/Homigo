<?php
/*
Author: Avijit Sen
*/
class Entrepreneur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_mod');
		//$this->load->library('cart');
		//$this->load->helper('form');
	}
	/* function Home ()
	{
	     parent::Controller();
		 $this->load->model('home_mod');
		 
	} */
	function index()
	{		
		$data['categorylist']=$sarr=$this->common->get_table_data(0,'job_category',''," order by job_category_id asc");
		$data['hot_jobs']=$sarr=$this->common->get_table_data(0,'job_list'," where status='active' and hot_job='yes' and curdate()<=last_date" ," order by rand()");
		//print_r($data['hot_jobs']);
		$data['msg']="";	
		
			$qry=$this->db->query("select count(*) as total from job_list where status='active'");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='job_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=7;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from job_list where status='active' and hot_job='no' and curdate()<=last_date order by $order $sort limit $start,$limit_per_page ";
			$qry=$this->db->query($sql);	
			$data['job_list']=$qry->result_array();
			//print_r($data['infolist']);
			$data['title']="Home";
			$data['description']="Home";
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;	
		
		$this->load->view('home',$data); 
	}


	function interview()
	{		

		$data['title']="Interview";
		$data['description']="Home";
		
		
		$this->load->view('entrepreneur/interview',$data);	
		
	}

	function interviewlist()
	{		

		$data['title']="Interview";
		$data['description']="Home";
		
		
		$this->load->view('entrepreneur/interviewlist',$data);	
		
	}
	
	
}
?>
