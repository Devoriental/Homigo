<?php $this->load->view("header");?>
<section id="dashboard">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Change Password</h2>
		</div>
		

		<div class="row">
			<?php //$this->load->view("companyprofile/company_profile_submenu");?>
			<div class="col-sm-6">
				<?php if($msg!=''){?>
					<div class="alert alert-danger" id="msg"><?php echo $msg;?></div>
				<?php } ?>

				<form action="" method="post">			
					<!--Old Password:<br />
					<input type="password" name="old_pass"  size="25" required /><br><br>-->
					<div class="form-group">
						<label>New Password:</label>
						<input type="password" class="form-control" name="pass"   required>
					</div>
					<div class="form-group">	
						Retype New Password:
						<input type="password" class="form-control" name="re_pass"   required>
					</div>
					<div class="form-group">	
						<input type="submit" class="btn btn-primary btn-lg" name="password" value="Change Password" />
					</div>	
				</form>
			</div>

		</div>	


	</div>
</section>


	
   <?php $this->load->view("footer");?>