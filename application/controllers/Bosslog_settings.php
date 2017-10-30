<?php
/*
Author: Avijit Sen
*/
class Bosslog_settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('expenditure_mod');
		//$this->load->model('sale_mod');
		//$this->load->model('loan_mod');
	}

	function index()
	{

		//$data['itemdata']=$sarr=$this->common->get_table_data(0,'expenditure_item',''," order by item_id asc");
		//$data['anolist']=$sarr=$this->common->get_table_data(0,'annotation',''," order by title");
		//print_r($_REQUEST);
		/* if(@$_POST['add_item']=='Add Item'){
			$item=$_REQUEST['itemtxt'];
			$this->db->query("insert into expenditure_item set item_name='$item'");
		} */
		$data['title']="";
		$data['keyword']="";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('admin/settings',$data);
	}

	function update_settings()
	{


		//$data['anolist']=$sarr=$this->common->get_table_data(0,'annotation',''," order by title");
		//print_r($_REQUEST);
		/* if(@$_POST['add_item']=='Add Item'){
			$item=$_REQUEST['itemtxt'];
			$this->db->query("insert into expenditure_item set item_name='$item'");
		} */
		//$data['no_job_at_home']=$this->common->get_table_data(1,'site_config'," where config_data='number_of_job_home' and status='active'","");

		if($this->session->userdata('ADLOG')=='ADLOG'){
			if(isset($_POST['update'])){
				$no_job_home=$_POST['no_job_home'];
				$sql="update site_config set config_value=$no_job_home where config_data='number_of_job_home'";
				$this->db->query($sql);
			}
			$data['no_job_at_home']=$this->common->get_table_data(1,'site_config'," where config_data='number_of_job_home' and status='active'","");
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Settings";
		$this->load->view('admin/settings',$data);

	}

function advertise_list()
	{
		if($this->session->userdata('ADLOG')=='ADLOG'){
			$sql="select * from advertise_list order by advertise_id asc";
			$qry=$this->db->query($sql);
			$data['a_list']=$qry->result_array();
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']="Advertise List";
		$this->load->view('admin/advertise_list',$data);

	}

	function advertise_update($adv_id=1)
		{

			if($this->session->userdata('ADLOG')=='ADLOG'){

				if(isset($_POST['update'])){
					$no_job_home=$_POST['no_job_home'];
					$sql="update site_config set config_value=$no_job_home where config_data='number_of_job_home'";
					$this->db->query($sql);
				}

				$sql="select * from advertise_list where advertise_id=$adv_id";
				$qry=$this->db->query($sql);
				$data['arr']=$qry->row_array();

			}
			else
				redirect(site_url()."/bosslog.html");
			$data['title']="Advertise List";
			$this->load->view('admin/advertise_update',$data);

		}
}
?>
