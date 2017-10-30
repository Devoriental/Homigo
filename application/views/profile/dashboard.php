<?php $this->load->view("header");?>
<section id="about-us">
	<div class="container">
		<!--<div class="center wow fadeInDown" style="border:1px solid green;">
				<h2>Dashboard</h2>
				<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
				
		</div>-->
	
		<div class="skill-wrap clearfix" style="border:0px solid red;">
			
								
			<div class="row" style="border:0px solid green;">
	
				<div class="col-sm-3">
					<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
						<a class="adash" href="<?php echo site_url()?>profile/viewresume.html" target=_blank><div class="joomla-skill">                                   
							<p>View</p>
							<p>Resume</p>
						</div>
						</a>
					</div>
				</div>
				
				<div class="col-sm-3">
					<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<a class="adash" href="<?php echo site_url()?>profile/myresume.html" target=_blank>
						<div class="html-skill"><p>Edit</p><p>Resume</p></div>
					</div></a>
				</div>
				
				<div class="col-sm-3">
					<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
						<a class="adash" href="<?php echo site_url()?>profile/changepassword.html" target=_blank><div class="css-skill">                                    
							<p>Change</p>
							<p>Password</p>
						</div></a>
					</div>
				</div>
				
				<div class="col-sm-3">
					<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
						<a class="adash" href="<?php echo site_url()?>profile/mystats.html" target=_blank><div class="wp-skill">
							<p>My</p>
							<p>Statistics</p>                                     
						</div></a>
					</div>
				</div>
				
							 
				
			</div>
			<div class="row" style="border:0px solid green;margin-top:30px;">
				<div class="col-sm-12">
					  <!--<img class="img-responsive" src="<?php echo site_url();?>images/adimage/itlab.jpg" style="border:1px solid #00B8DF;">-->
					  <img class="img-responsive" src="<?php echo site_url();?>images/adimage/orchid.jpg" >
				</div>
			</div>	
    	</div>
	</div>			
</section>	



<?php $this->load->view('footer');?>