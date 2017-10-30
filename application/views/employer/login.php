<?php $this->load->view("header");?>
  <section id="log-in">
        <div class="container" style="border:0px solid red;">

			<div class="center">
				<h2 class="h1_left_class">Login (Employer)</h2>
			</div>

			<div class="row" style="border:0px solid red;margin-bottom:0px;padding-top:0px">
				<div class="col-sm-6">
					<?php if($msg!=''){?>
						<div class="alert alert-danger"><?php echo $msg;?></div><br>
				 	<?php } ?>
					<form action="" method="post">	
						<div class="form-group">				
							<label>Email:</label>
							<input type="email" class="form-control" name="email"  size="30">
						</div>
						<div class="form-group">				
							<label>Password:</label>
							<input type="password" class="form-control" name="pass"  size="30">
						</div>
						<div class="form-group">					
							<input type="submit" class="btn btn-primary btn-lg" name="c_login" value="Login">
						</div>	
					</form>
					<p>If you have no account, then you can
						<a href="<?php echo site_url()?>employer/signup.html" class="acolor" style="font-weight:bold;">Create New Account</a>
				 	</p>
				</div>
			</div>
		</div>
	</section>			
						
				
<?php $this->load->view("footer");?>		
