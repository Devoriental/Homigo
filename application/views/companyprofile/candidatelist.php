<?php $this->load->view("header");?>

<section id="statistics">
	<div class="container">
		<div class="center wow fadeInDown">
			<h3>Candidate List of "<?php echo $job_info['job_title'];?>"</h3>
		</div>

		<div class="row">
			<div class="col-sm-8">
				<?php 
					$counting=$this->uri->segment(4,1);	
					$counting=($counting-1)*$limit_per_page+1;
					$i=0;
					
				foreach ($applylist as $key => $value) {
			      $jr=$this->common->get_table_data(1,'user'," where user_id=$value[user_id]"," "); 
			      //echo $this->db->last_query();	
				?>	
				<div style="background-color:;border-radius:.1em;font-size:17px; margin-bottom:5px;padding:5px;">			
		    		<?php echo ($counting+$i).') '.$jr['user_name'].'<br>';?>	 
		    		Expected Salary: <?php if($value['expected_salary']!=0)echo $value['expected_salary'].'/=';else echo 'N/A';?>
		    		&nbsp;&nbsp;(Applied on: <?php echo show_date($value['apply_date']);?>)<br>   	
		    		<a href="<?php echo site_url();?>companyprofile/candidate/<?php echo $job_info['job_id']?>/<?php echo $jr['user_id']?>.html" target=blank class="acolor">View Profile</a>
		    	</div>	
		    	<?php $i++; }?>
		    	<span class="textcolor">						
					&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/candidatelist/<?php echo $job_info['job_id'];?>/1.html"><i class="fa fa-angle-double-left fa-lg"></i></a>
					&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/candidatelist/<?php echo $job_info['job_id'];?>/<?php echo $currentpage-1;?>.html"><i class="fa fa-angle-left fa-lg"></i></a>

					&nbsp;&nbsp;Showing <?php echo $start+1;//$currentpage;?> - <?php echo $start+$limit_per_page;?> of total <?php echo $total_data;//$total_page;?> candidates&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/candidatelist/<?php echo $job_info['job_id'];?>/<?php echo $currentpage+1;?>.html"><i class="fa fa-angle-right fa-lg"></i></a>
					&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/candidatelist/<?php echo $job_info['job_id'];?>/<?php echo $total_page;?>.html"><i class="fa fa-angle-double-right fa-lg"></i></a>
				</span>
			</div>
		</div>	

	</div>
</section>		

   <?php $this->load->view("footer");?>