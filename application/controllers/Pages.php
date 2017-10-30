<?php
/*
Author: Avijit Sen
*/
class Pages extends CI_Controller 
{
    /* function Info ()
	{
	     parent::Controller();
		 //$this->load->model('home_mod');
		 
	} */
	public function __construct(){
		parent::__construct();
		$this->load->model('home_mod');
	
	}
	function index()
	{			 
		/* $data['saintlist']=$sarr=$this->common->get_table_data(0,'saint',''," order by saint_name");
		$data['anolist']=$sarr=$this->common->get_table_data(0,'annotation',''," order by title");
		$data['tg']="home";
		$this->load->view('home',$data);  */
	}
	function about()
	{			 
		/* $data['saintlist']=$sarr=$this->common->get_table_data(0,'saint',''," order by saint_name");*/
		
		$data['abt']=$sarr=$this->common->get_table_data(1,'pages'," where page_tag='aboutus'","");		
		$data['title']=" About us";
		$data['keyword']="about us";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('pages/aboutus',$data);  
	}
	
	function tos()
	{			 
		$data['tos']=$sarr=$this->common->get_table_data(1,'pages'," where page_tag='tos'","");		
		$data['title']=" About us";
		$data['keyword']="about us";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('pages/tos',$data);  
	}
	
	function advertisewithus()
	{			 
		$data['tos']=$sarr=$this->common->get_table_data(1,'pages'," where page_tag='adwithus'","");		
		$data['title']=" About us";
		$data['keyword']="about us";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('pages/advertisewithus',$data);  
	}
	
	function contact()
	{			 
		/* $data['saintlist']=$sarr=$this->common->get_table_data(0,'saint',''," order by saint_name");
		$data['anolist']=$sarr=$this->common->get_table_data(0,'annotation',''," order by title");
		*/
		$this->load->library('form_validation');
		$msg="";
		
		if(@$_POST['op']=='Send'){ 
			
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Mail', 'required|valid_email');
			//$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				//echo "false";
				//$this->load->view('myform');
			}
			else
			{
				$this->load->library('email');
				$name=$_POST['name'];
				$mail=$_POST['email'];
				$subject=$_POST['subject'];
				$message=$_POST['message'];
				$this->email->from($mail, $name);
				$this->email->to('write@journeymakerjobs.com');
				//$this->email->cc('another@another-example.com');
				//$this->email->bcc('them@their-example.com');

				$this->email->subject($subject." - journeymakerjobs.com");
				$this->email->message($message);

				$this->email->send();
				$msg="Email is sent";
				
				//echo $this->email->print_debugger();
			}
				
		}
		$data['msg']=$msg;
		$data['title']=" Contact ";
		$data['keyword']="Contact us";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('pages/contact',$data);  
	}
}
?>
