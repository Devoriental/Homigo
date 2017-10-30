<?php
/*
Author: Avijit Sen
*/
class Viewprofile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('sale_mod');
		
	}
	/* function Home ()
	{
	     parent::Controller();
		 $this->load->model('home_mod');
		 
	}
 */
	function index()
	{		
		$data['balancedata']=$sarr=$this->common->get_table_data(0,'balance',''," order by balance_id desc");
		//$data['anolist']=$sarr=$this->common->get_table_data(0,'annotation',''," order by title");
		//print_r($_REQUEST);
		if(@$_POST['add_item']=='Add Item'){
			$item=$_REQUEST['itemtxt'];	
			$this->db->query("insert into sale_item set item_name='$item'");
		}
		$data['itemdata']=$sarr=$this->common->get_table_data(0,'sale_item',''," order by item_id asc");
		$data['title']="";
		$data['keyword']="";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('sale/sale',$data); 
	}
	
	function profile()
	{		
		
		$data['msg']="";
		if($this->session->userdata('company_ID')!=''){
			$user_id=$this->uri->segment(3);
			
			$sql="select * from user where user_id=$user_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();
			
			$dsql="select * from user_detail where user_id=$user_id";
			$query=$this->db->query($dsql);
			$data['detail_arr']=$query->row_array();

			$dsql="select * from user_education where user_id=$user_id";
			$query=$this->db->query($dsql);
			$data['edu_arr']=$query->result_array();

			$wsql="select * from user_work where user_id=$user_id";
			$query=$this->db->query($wsql);
			$data['emp_arr']=$query->result_array();

			$tsql="select * from user_training where user_id=$user_id";
			$query=$this->db->query($tsql);
			$data['tra_arr']=$query->result_array();
		}
		else
			redirect(site_url());
		//$data['itemdata']=$sarr=$this->common->get_table_data(1,'sale_item',$where," ");
		
		$data['title']="";
		$data['keyword']="";
		$data['description']="";
		$data['tg']="home"; 
		$this->load->view('profile/viewprofile',$data); 
	}
	function search()
	{	
		
		$sel_search=$_REQUEST['select_search'];
		//$balance=$_REQUEST['balance'];
		if($sel_search=='bydate'){
			$one_date=$_REQUEST['one_date'];
			$split_date=explode("-",$one_date);
			$mon_ind=get_month_index($split_date[1]);
			$thedate=$split_date[2].'-'.$mon_ind.'-'.$split_date[0];
			$data['saleexp']=$this->sale_mod->get_search_bydate($thedate);
			$data['ttl']= "&nbsp;".$one_date;
		}
	 	elseif($sel_search=='fromdate'){	
			$from_date=$_REQUEST['from_date'];
			$to_date=$_REQUEST['to_date'];
			$split_datef=explode("-",$from_date);
			$split_datet=explode("-",$to_date);
			$mon_indf=get_month_index($split_datef[1]);
			$mon_indt=get_month_index($split_datet[1]);
			$fromdate=$split_datef[2].'-'.$mon_indf.'-'.$split_datef[0];
			$todate=$split_datet[2].'-'.$mon_indt.'-'.$split_datet[0];
			$data['saleexp']=$this->sale_mod->get_search_byfromdate($fromdate,$todate);
			$data['ttl']= "&nbsp;".$from_date." to ".$to_date;
		}
		elseif($sel_search=='bymonth')
		{
			$smonth=$_REQUEST['smonth'];
			$syear=$_REQUEST['syear'];
			$data['saleexp']=$this->sale_mod->get_search_bymonth($smonth,$syear);
			$data['ttl']= "&nbsp;".get_month_name($smonth);
		} 
		/* $this->db->query("insert into balance set starting_balance=
			$balance, closing_balance=$balance, balance_date=UNIX_TIMESTAMP(),
			balance_day=CURDATE()"); */
		//echo "Balance is added";
		//$data['saintlist']=$sarr=$this->home_mod->get_saint_list();
		/* $data['title']="";
		$data['keyword']="";
		$data['description']="";
		$data['tg']="home"; */
		$this->load->view('sale/search',$data); 
	}
	
	
}
?>
