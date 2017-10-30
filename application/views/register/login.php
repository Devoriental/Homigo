<?php $this->load->view("header");?>

<section id="log-in">
        <div class="container" style="">

			<div class="center" style="border:0px solid green;padding-bottom:0px;">  
                <h2 style="">Login ( Vendor )</h2>
                <img class="img-responsive" src="<?php echo site_url();?>images/adimage/saarc_International_college.jpg">
                <br>
			</div>	

			<?php if($msg!=''){?>
				<div class="alert alert-danger"><?php echo $msg;?></div><br>
			<?php } ?>
			<div class="row" style="border:0px solid red;margin-bottom:0px;padding-top:0px">
				<form class="contact-form" name="contact-form" method="post" action="<?php echo site_url();?>register/login.html">
					<div class="col-sm-6" style="border:0px solid red;">				
						<div class="form-group">
							<label>Username *</label>
							<input class="form-control" type="text" name="username" placeholder="Username" maxlength="15" required="required"><br>
						</div>	
						<div class="form-group">
							<label>Password *</label>
							<input class="form-control" type="password" name="pass"  placeholder="Password" size="30" maxlength="12" /><br /><br />
						</div>	
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-primary btn-lg" value="Login">
							<!--<button type="submit" name="login" class="btn btn-primary btn-lg" >Login </button>-->
						</div>	
					</div>	
				</form>
				<div class="col-sm-4" style="float:right;border:0px solid red;">
					 <!--<img class="img-responsive" src="<?php echo site_url();?>images/adimage/290.png">-->
				</div>
				<div class="col-sm-8" style="border:0px solid green;">	
					<a href="<?php echo site_url()?>register/forgetpassword.html">Forgot Password ?</a>
					<p>If you have no account, please 
						<a href="<?php echo site_url()?>register/signup.html" class="acolor" style="font-weight:bold;">Create A New Account</a>
					</p><br>
					
				</div>	
			</div>
		</div>	
				 
	</section>
				
<?php $this->load->view("footer");?>	