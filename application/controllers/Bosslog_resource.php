<?php
/*
Author: Avijit Sen
*/
class Bosslog_resource extends CI_Controller
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
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')!='ADLOG'){			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/bosslog_insert',$data); 
		
	}	
	
	
	function viewresource($curpage=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			$qry=$this->db->query("select count(*) as total from resource");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='resource_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=40;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from resource order by $order $sort limit $start,$limit_per_page";
			$qry=$this->db->query($sql);	
			$data['resource_list']=$qry->result_array();
			//print_r($data['infolist']);
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;						
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/viewresource',$data); 
		
	}

	function editresource($resource_id=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			if(isset($_REQUEST['update'])){
				$ttl=$_REQUEST['ttl'];
				$writer=$_REQUEST['writer'];
				$writer_detail=$_REQUEST['writer_detail'];
				$theresource=addslashes($_REQUEST['theresource']);
				$post_date=$_REQUEST['post_date'];								
				$status=$_REQUEST['status'];	

				 $isql="update  resource set resource_title='$ttl',writer='$writer',
						writer_detail='$writer_detail',resource_text='$theresource', resource_date='$post_date',
						status='$status' where	resource_id=$resource_id";	
				$this->db->query($isql); 
			}	
			$sql="select * from resource where resource_id=$resource_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();
			
			
									
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Edit user";
		$this->load->view('admin/editresource',$data); 
		
	}
	
	
	
}
?>
