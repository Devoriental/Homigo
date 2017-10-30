<?php $this->load->view("header");?>
<section id="statistics">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Statistics</h2>
		</div>

		<div class="row">
			<?php //$this->load->view("companyprofile/company_profile_submenu");?>
			<div class="col-sm-8">
				<a class='btn btn-primary btn-lg' href="<?php echo site_url()?>companyprofile/postjob.html">&nbsp; Post a job &nbsp;</a>
			</div>
			<div class="col-sm-8">
				<h4 style="">Our Posted Job</h4>
				<ul class="list-group">	
				<?php 
					$counting=$this->uri->segment(3,1);	
					$counting=($counting-1)*$limit_per_page+1;
					$i=0;
					foreach ($applylist as $key => $value) {
			      $jr=$this->common->get_table_data(1,'job_list'," where job_id=$value[job_id]"," "); 	
				?>
				<li class="list-group-item list-group-item-warning"><a href="<?php echo site_url();?>job/detail/<?php echo $jr['job_id']?>.html" style=""><?php echo $counting+$i.') '.$jr['job_title'].'<br>';?></a>	    	
					<h5 style="margin:4px 0px 4px 2px;padding:0px 0px 0px 0px;">Posted on:&nbsp;<?php if($jr['post_date']!='0000-00-00 00:00:00'){echo show_date($jr['post_date']);}else echo "n/a";?>
					&nbsp;&nbsp;&nbsp;
					Total applicants: <?php $this->db->where('job_id', $jr['job_id']);
						echo $this->db->count_all_results('job_apply');?></h5>
					<label class="label label label-default"><a href="<?php echo site_url();?>companyprofile/editjob/<?php echo $jr['job_id']?>.html" style="">Edit the posted job</a></label>
	    			<label class="label label-default"><a href="<?php echo site_url();?>companyprofile/candidatelist/<?php echo $jr['job_id']?>.html">Show the candidates</a></label>
	    			<label class="label label-default"><a href="<?php echo site_url();?>companyprofile/summary/<?php echo $jr['job_id']?>.html" target=_blank>Summary List</a></label>
	    			<!--<label class="label label-default"><a href="<?php echo site_url();?>companyprofile/xllist/<?php echo $jr['job_id']?>.html">Summary of candidates in XL</a></label>-->
		    	</li>	
		    	<?php $i++; }?>
		    	<span class="textcolor">		    		
					&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/mystats/1.html"><i class="fa fa-angle-double-left fa-lg"></i></a>
					&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/mystats/<?php echo $currentpage-1;?>.html"><i class="fa fa-angle-left fa-lg"></i></a>

					&nbsp;&nbsp;Showing <?php echo $start+1;//$currentpage;?> - <?php echo $start+$limit_per_page;?> of total <?php echo $total_data;//$total_page;?> job&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/mystats/<?php echo $currentpage+1;?>.html"><i class="fa fa-angle-right fa-lg"></i></a>
					&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/mystats/<?php echo $total_page;?>.html"><i class="fa fa-angle-double-right fa-lg"></i></a>
			</span>
			</div>
		</div>


	</div>
</section>		
			
			
<?php $this->load->view("footer");?>