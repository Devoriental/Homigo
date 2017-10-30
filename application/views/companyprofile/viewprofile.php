<?php $this->load->view("header");?>

<section id="about-us">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Employer Profile</h2>
		</div>	
		<div class="row">
			<div class="col-sm-8">
				<? if($arr['photo']!=''){?>
					<img src="<?php echo site_url()?>images/companylogo/<?php echo $arr['photo'];?>" width='150' height='155'>
					 
				<?php }?>
				<br><br>
				<label>Employer/Organization/Company Name:</label>	
				<?php echo $arr['company_name'];?> <br><br>
				<label>Employer/Organization/Company Type:</label>	
				<?php echo $arr['company_type'];?> <br><br>
				<label>Concern Person's Name:</label>	
				<?php echo $arr['concern_person'];?> <br><br>
				<label>Concern Person's Designation:</label>	
				 <?php echo $arr['concern_designation'];?><br><br>
				<label>mobile:</label>	
				<?php echo $arr['mobile'];?> <br /><br />
				<label>Email:</label>	
				<?php echo $arr['email'];?> <br /><br />
				<label>Address:</label>	
				<?php echo $arr['company_address'];?><br><br>
				<label>Website:</label>	
				<?php echo $arr['website'];?><br /><br />
			</div>
		</div>	
	</div>
</section>		
							
					
		
<?php $this->load->view("footer");?>
