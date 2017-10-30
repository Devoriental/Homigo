<?php $this->load->view("header");?>
  <section id="post-resume">
        <div class="container" style="border:0px solid red;">

			<div class="center">  
                <h2>Forget Password ( User )</h2>
                <p>Please enter the email address you used when you registered and we will email you with your password.</p>
			</div>	
				
				<?php if($msg!=''){
					if($sentry==0){
					?>
						<div class="alert alert-info"><?php echo $msg;?></div><br>
					<?php }if($sentry==1){?>
						<div class="alert alert-success"><?php echo $msg;?></div><br>
				<?php }} ?>
				<div class="row" style="border:0px solid red;margin-bottom:0px;padding-top:0px">
					<form class="contact-form" name="forget-form" method="post" action="">
						
						<div class="col-sm-6">				
							<div class="form-group">
								<label>Email:</label>
								<input class="form-control" type="email" name="email" placeholder="Email"  required="required">						
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" />
							</div>
						</div>
					</form>			
				</div>
		</div>		
</section>
				
<?php $this->load->view("footer");?>				
				<!--<form action="" method="post">
					<h1 class="h1_left_class">Company login</h1>
					Email:<br />
					<input type="email" name="email"  size="30" /><br><br>
					Password:<br />
					<input type="password" name="pass"  size="30" /><br /><br />
					<input type="submit" name="c_login" value="Login" />
				</form>
	-->
				
   
