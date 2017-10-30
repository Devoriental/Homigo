<?php $this->load->view("header");?>
<section id="about-us">
	<div class="container">
		<?php //$this->load->view("profile/profile_submenu");?>
		<div class="center wow fadeInDown">
			<h2>Your Overall Stat</h2>			

		</div>

		<div class="row">
			<div class="col-sm-8">
				<h4 style="color:#">Number of jobs applied</h4>	
				<ul class="list-group">	  
					<?php $i=1;foreach ($applylist as $key => $value) {
				      $jr=$this->common->get_table_data(1,'job_list'," where job_id=$value[job_id]"," "); 	
					?>
					<li class="list-group-item list-group-item-warning">
						<a href="<?php echo site_url();?>job/detail/<?php echo $jr['job_id']?>.html" style="font-weight:bold;"><?php echo $i.') '.$jr['job_title'].'<br>';?></a>
						Applied on: <?php echo show_date($value['apply_date']);?> <br>
						<label class="label label-primary">Expected Salary&nbsp;: <?php if($value['expected_salary']!=0)echo $value['expected_salary'].'/=';else echo 'N/A';?></label>
					</li>
		    			    	
						
		    		
		    		<?php $i++; }?>
	    		</ul>
	    		<span class="textcolor">						
				&nbsp;&nbsp;
				<a href="<?php echo site_url();?>profile/mystats/1.html"><i class="fa fa-angle-double-left fa-lg"></i></a>
				&nbsp;&nbsp;
				<a href="<?php echo site_url();?>profile/mystats/<?php echo $currentpage-1;?>.html"><i class="fa fa-angle-left fa-lg"></i></a>

				&nbsp;&nbsp;Showing <?php echo $start+1;//$currentpage;?> - <?php echo $start+$limit_per_page;?> of total <?php echo $total_data;//$total_page;?> job&nbsp;&nbsp;
				<a href="<?php echo site_url();?>profile/mystats/<?php echo $currentpage+1;?>.html"><i class="fa fa-angle-right fa-lg"></i></a>
				&nbsp;&nbsp;
				<a href="<?php echo site_url();?>profile/mystats/<?php echo $total_page;?>.html"><i class="fa fa-angle-double-right fa-lg"></i></a>
				</span>
			</div>	

			<div class="col-sm-8" style="margin-top:15px;">
				<h4 style="color:#">Number of companies viewed my profile</h4>
			</div>	
		</div><!--End of row class-->

	</div>
</section>		
			
			
	    	
		
<?php $this->load->view("footer");?>
    