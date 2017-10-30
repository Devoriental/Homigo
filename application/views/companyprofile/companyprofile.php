<?php $this->load->view("header"); ?>
<section id="statistics">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Employer Information</h2>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<?php if($msg!=''){?>
					<div class="alert alert-success"><?php echo $msg;?></div>
				<?php } ?>
				<?php if($arr['photo']!=''){ ?>
					<img src="<?php echo site_url()?>images/companylogo/<?php echo $arr['photo'];?>" width='150' height='155'>
				<?php } else{ ?>
					<div style="width:150px;height:155px;border:3px solid white;background:#b3b3ac;border-radius:.3em">
						<p style="text-align:center;margin-top:50px;font-size:20px;">Your Logo</p>
					</div>
				<?php } ?>	
				<br><br>
				<a href="<?php echo site_url()?>companyprofile/photo.html">Upload/update your logo</a>							
			</div>

			<div class="col-sm-8" style="margin-top:30px;">
				<form action="" method="post">
					<div class="form-group">
						<label>Employer/Organization/Company Name:</label> *	
						<input type="text" class="form-control" name="name"  value="<?php echo $arr['company_name'];?>" required>
					</div>
					<div class="form-group">	
						<label>Employer/Organization/Company Type:</label>	*
						<input type="text" class="form-control" id="emp_type" name="emp_type"  value="<?php echo $arr['company_type'];?>" required>
					</div>
					<div class="form-group">
						<label>Concern Person's Name:</label>	*
						<input type="text" class="form-control" id="cp_name" name="cp_name"   value="<?php echo $arr['concern_person'];?>" required>
					</div>
					<div class="form-group">	
						<label>Concern Person's Designation:</label> *	
						<input type="text" class="form-control" id="cp_desig" name="cp_desig"   value="<?php echo $arr['concern_designation'];?>"required>
					</div>
					<div class="form-group">	
						<label>mobile:</label>	*
						<input type="text" class="form-control" name="tel" id="tel" required  value="<?php echo $arr['mobile'];?>" required >
					</div>
					<div class="form-group">	
						<label>Email:</label>	*
						<input type="email" class="form-control" id="email" name="email"  value="<?php echo $arr['email'];?>"  required >
					</div>
					<div class="form-group">	
						<label>Address:</label>	*
						<textarea required name="address" class="form-control" rows="5" cols="45" maxlength="110"><?php echo $arr['company_address'];?></textarea>
					</div>
					<div class="form-group">	
						<label>Website:</label>
						<input type="text" class="form-control" id="website" name="website"  value="<?php echo $arr['website'];?>" />
					</div>
					<div class="form-group">			
						<input type="submit" name="update" class="btn btn-primary btn-lg" value="Update" onclick="" />
						<span id="msg2" style="color:red;"></span>
					</div>	
				</form>	
			</div>	
		</div>	
	</div>

</section>		
<?php $this->load->view("footer");?>