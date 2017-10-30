<?php $this->load->view("header");?>
<section id="job-detail">
    <div class="container" style="border:0px solid red;">
		<div class="center">  
                <h2>Applying Job</h2>
                <img class="img-responsive" src="<?php echo site_url();?>images/adimage/coxsbazar.jpg" alt="Coxsbazar">
		</div>	
		<div class="col-md-8 col-sm-6" style="border:0px solid red;margin-bottom:0px;">
			<h3 style="color:#C52D2F;width:100%;font-weight:bold;"><?php echo $job_detail['job_title'];?></h3>
			<?php 
						$query=$this->db->query("select company_name from company where company_id=$job_detail[company_id]");	
						$crr=$query->row_array();
			?>					
			<h5 style="font-weight:bold;">Company:  &nbsp;<?php echo $crr['company_name'];?></h5><br>
			<?php if($msg!=''){?>
						<div class="alert alert-info"><?php echo $msg;?></div><br>
			<?php } ?>

			<?php 
			 if($this->session->userdata('ID')!=''):
					$user_id=$this->session->userdata('ID');
					$job_id=$job_detail['job_id'];
					$jrr=$this->common->get_table_data(1,'job_apply'," where job_id=$job_id and user_id=$user_id"," ");	
					if(count($jrr)>0)	$datainsert='Yes';
			endif;			
			if($datainsert=='Yes') {?>
				<?php
   					$user_id=$this->session->userdata('ID');
					$usr=$this->common->get_table_data(1,'user'," where user_id=$user_id",'');		   			
   				?>
				<h4></h4>
				<h4 class="alert alert-success"><?php echo $usr['user_name'];?><br><br>You have applied this job successfully.</h4>
			<?php }?>


			<?php $theurl=site_url()."job/applyjob.html";?>
			<?php if($datainsert=='No'){?>	
					<div class="col-md-6 col-sm-6" style="border:0px solid green;">
						<form action="<?php echo $theurl;?>" method="post" role="form">					
							<div class="form-group">
								<label>Expected Salary:</label>
								<input type="text" class="form-control" name="expected_salary">
							</div>	

							<?php if($login=='No'){?>		<!--If  user is not login-->
								<div class="form-group">
									<label>Username:</label>
									<input type="text" class="form-control" name="username">
								</div>
								<div class="form-group">
									<label>Password:</label><br />
									<input type="password" class="form-control" name="pass">
								</div>
							<?php } ?>		
							<input type="hidden" name="job_id" value="<?php echo $job_detail['job_id']?>">
							<input type="submit" class="btn btn-primary btn-lg" name="confirm_apply" value="Confirm Apply" />
						</form>
					</div>	
			<?php }?>	
			<br>	
			<div class="col-md-12 col-sm-8" style="border:0px solid red;margin-top:20px;">
				<?php if($this->session->userdata('ID')==''):?>
						<p>If you have no account, then you can
							<a href="<?php echo site_url()?>register/signup.html" class="acolor" style="font-weight:bold;">Create New Account</a>
						</p><br>		
				<?php endif;?>
			</div>
			<div class="col-md-12 col-sm-8" style="border:0px solid red;margin-top:20px;">
				<img class="img-responsive" src="<?php echo site_url();?>images/adimage/pedalhouse2.jpg" alt="PedalHouse">
			</div>	
		</div>
	</div>
</section>

			
<?php $this->load->view("footer"); ?>