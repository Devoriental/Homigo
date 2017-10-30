<?php $this->load->view("header");?>
<section id="about-us">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Upload Photo</h2>			
		</div>
		<?php if($msg!=''){?>
						<div class="alert alert-success"><?php echo $msg;?></div><br>
		<?php } ?>
		<div class="row">
			<div class="col-sm-8">
				<? if($arr['photo']!=''){?>
			 		Your profile photo:<br>
					<img src="<?php echo site_url()?>images/profileimage/<?php echo $arr['photo'];?>" width='150' height='155'>
					<br> 
				<?php }?>
				<form action="<?php echo site_url()?>profile/photo.html" method="post" enctype="multipart/form-data">		
					
					<p>Upload/update your photo.</p><br> 
					
					<input type="file" name="userfile">
					<input type="submit" name="sb" class="btn btn-primary btn-lg" value="Submit"><br>	<br>	
					<p>
						<ul style="list-style-type:disc;margin-left:15px;">
							<li>Photo width maximum 250 pixel</li>
							<li>Photo height maximum 250 pixel</li>
							<li>File size maximum 350 KB</li>
							<li>jpg/png/gif files are supported</li>
						</ul>
					</p><br>
					<p>
						For resizing photo you can visit below link:<br>
						<a href="http://www.resizeyourimage.com/EN/" target="blank">http://www.resizeyourimage.com/EN/</a><br>
						<a href="http://www.webresizer.com/" target="blank">http://www.webresizer.com/</a>
					</p>
					
				
					
				</form>

			</div>
		</div>
	</div>
</section>		

	

 <?php $this->load->view("footer");?>
 