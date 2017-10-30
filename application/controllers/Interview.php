<?php
/*
Author: Avijit Sen
*/
class Interview extends CI_Controller
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
		
			

			$isql="select * from interview where status='active' order by interview_date ";
			$iry=$this->db->query($isql);
			$data['interviews']=$irr=$iry->result_array();
			//print_r($irr);
		
			$data['title']="Interview";
			$data['description']="Interview";
		
		
		$this->load->view('interview/index',$data); 
	}
	
	function interviewlist($curpage=1)
	{		
		
			$qry=$this->db->query("select count(*) as total from interview where status='active'");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='interview_date';
			if($curpage=='')$curpage=1;
			$limit_per_page=5;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;

			$isql="select * from interview where status='active' order by $order $sort limit $start,$limit_per_page ";
			$iry=$this->db->query($isql);
			$data['interviews']=$irr=$iry->result_array();
			//print_r($irr);
		
			$data['title']="Interview";
			$data['description']="Interview";
		
		
		$this->load->view('interview/interviewlist',$data); 
	}

	function detail($interview_id=1)
	{		
		
			$isql="select * from interview where status='active' and interview_id=$interview_id";
			$iry=$this->db->query($isql);
			$data['interview']=$irr=$iry->row_array();
			//print_r($irr);
		
			$data['fimage']="http://www.journeymakerjobs.com/images/interview/".$data['interview']['interview_photo'];
			$data['title']="Interview ".$data['interview']['interview_title'];
			$data['description']="Interview ".$data['interview']['interview_title'];
		
		
		$this->load->view('interview/detail',$data); 
	}
}
?>
