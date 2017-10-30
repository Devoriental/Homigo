<?php $this->load->view("header");?>
<script>
$(function() {
	$('#startDatepicker').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#endDatepicker').datepick({dateFormat: 'yyyy-mm-dd'});
	//$(selector).datepick({dateFormat: 'yyyy-mm-dd'});
	
});
function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>

<?php 
	$name=$real_name=$company_type=$email=$cp_name=$cp_desig=$tel=$con_email="";
	if(count($a)>0):
		$name=$a['name'];	$real_name=$a['real_name'];	$company_type=$a['emp_type'];	$tel=$a['tel'];	 
		$cp_name=$a['cp_name'];		$cp_desig=$a['cp_desig'];	$email=$a['email']; $con_email=$a['con_email'];
		
	  endif
?>
<section id="employer-signup">
	    <div class="container" style="border:0px solid red;">
        	<div class="center wow fadeInDown">
        		<h2 style="">Employer Registration</h2>
        		<p>Fill the information below to create your account. Please <a href="<?php echo site_url()?>employer/login.html" class="acolor" style="font-weight:bold;">login</a>
				 if you are already registered.					 
					 * - Mandatory field.					 
				 </p>				 
        	</div>

        	<div class="row">
        		<div class="col-sm-8">
        			<?php if($errmsg!=''){?>
						<div class="alert alert-danger" id="msg"><?php echo $errmsg;?></div>
				 	<?php } ?>

				 	<form action="" method="post">
						<div class="form-group">
							<label>Employer/Organization/Company Name:</label> *	
							<input type="text" class="form-control" id="name" name="name"   required value="<?php echo $name;?>" >
						</div>
						<div class="form-group">
							<label>Employer/Organization/Company's <b>Disguise</b> Name:(This name will no appear in the website)</label>	
							<input type="text" class="form-control" id="real_name" name="real_name"  value="<?php echo $real_name;?>" >
						</div>
						<div class="form-group">
							<label>Employer/Organization/Company Type:</label>	*
							<input type="text" class="form-control" id="emp_type" name="emp_type"  value="<?php echo $company_type;?>" required>
						</div>
						<div class="form-group">
							<label>Concern Person's Name:</label> *	
							<input type="text" class="form-control" id="cp_name" name="cp_name"   required value="<?php echo $cp_name;?>" >
						</div>
						<div class="form-group">
							<label>Concern Person's Designation:</label> *	
							<input type="text" class="form-control" id="cp_desig" name="cp_desig"   required value="<?php echo $cp_desig;?>" >
						</div>
						<div class="form-group">
							<label>mobile:</label> *	
							<input type="text" class="form-control" name="tel" id="tel"  required value="<?php echo $tel;?>">
						</div>
						<div class="form-group">
							<label>Email:</label> *	
							<input type="email" class="form-control" id="company_email" name="email"   required value="<?php echo $email;?>">
						</div>
						<div class="form-group">
							<label>Confirm Email:</label>	*
							<input type="email" class="form-control" id="con_email" name="con_email"   required value="<?php echo $con_email;?>" >
						</div>
						<div class="form-group">
							<label>Password:</label>	*
							<input type="password" class="form-control" id="password" name="password"  maxlength="12" required >
						</div>
						<div class="form-group">
							<label>Retype Password:</label> *	
							<input type="password" class="form-control" id="re_password" name="re_password" maxlength="12" required >
						</div>
						<div class="form-group">			
							<input type="submit" name="company_signup" class="btn btn-primary btn-lg" value="Signup" onclick="" />
							<span id="msg2" style="color:red;"></span>
						</div>	
						
					</form>	
				 </div>	
			</div>	 
        </div>
</section>        	


				
<?php $this->load->view("footer");?>		