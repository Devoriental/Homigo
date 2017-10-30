<?php $this->load->view("header");?>
<section id="about-us">
	<div class="container">
		<?php //$this->load->view("profile/profile_submenu");?>

		<div class="center wow fadeInDown">
			<h2>Change Password</h2>			
		</div>		
		<?php if($msg!=''){?><p class="alert alert-success"><?php echo $msg.'<br>';?></p><?php }?>
		<div class="row" style="border:0px solid red;margin-bottom:0px;padding-top:0px">
			<div class="col-sm-4">
				<form action="" method="post">			
					
					* Spaces are not allowed.<br>
					* Minimum 6 characters and maximum 12 characters<br><br>
					<div class="form-group">
						<label> New Password:</label>
						<input type="password" class="form-control" name="pass"  size="25" required maxlength='12'>
					</div>
					<div class="form-group">
						<label>Retype New Password:</label>
						<input type="password" class="form-control" name="re_pass"  size="25" required maxlength='12'>
					</div>
					<div class="form-group">
						<input type="submit" name="password" class="btn btn-primary btn-lg" value="Change Password">
					</div>	
				</form>
			</div>
		</div>
	</div>
</section>


<?php $this->load->view("footer");?>
