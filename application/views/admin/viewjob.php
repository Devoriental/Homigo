<?php $this->load->view("admin/header");?>
<div class="row">
	<div class="twelve columns">
		<?php $this->load->view("admin/submenu_job");?>
		<h3>Job List</h3>
	</div>
</div>


<div class="row">
	<div class="twelve columns">
			<table class="u-full-width" border="1">
				<tr><th>Job Id <br>
						<a href='<?php echo site_url();?>bosslog_job/viewjob/1/jobid_asc.html'><i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i></a> 
						&nbsp; <a href='<?php echo site_url();?>bosslog_job/viewjob/1/jobid_desc.html'><i class="fa fa-arrow-down fa-lg" aria-hidden="true"></i></a> 
					</th>
					<th>Post</th><th>Company</th>
					<th>Last Date <br>
						<a href='<?php echo site_url();?>bosslog_job/viewjob/1/lastdate_asc.html'><i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i></a> 
						&nbsp; <a href='<?php echo site_url();?>bosslog_job/viewjob/1/lastdate_desc.html'><i class="fa fa-arrow-down fa-lg" aria-hidden="true"></i></a> 
					<th>Posted on <br>
					<a href='<?php echo site_url();?>bosslog_job/viewjob/1/postdate_asc.html'><i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i></a> 
						&nbsp; <a href='<?php echo site_url();?>bosslog_job/viewjob/1/postdate_desc.html'><i class="fa fa-arrow-down fa-lg" aria-hidden="true"></i></a></th>
					<th>Status</th><th>Action</th></tr>
				<?php $i=1; foreach($job_list as $jb){
					$comp=$this->common->get_table_data(1,'company'," where company_id=$jb[company_id]"," ");
				?>
				<tr <?php if($i%2==0){?>style="background:#c6dfb7;"<?php }?>>
					<td><?php echo $jb['job_id'];?></td>
					<td><?php echo $jb['job_title'];?></td>
					<td><?php echo $comp['company_name'];?></td>					
					<td><?php echo show_date($jb['last_date']);?></td>
					<td><?php echo show_date($jb['post_date']);?></td>
					<td><?php echo $jb['status'];?></td>
					<td>
						<a href="<?php echo site_url();?>bosslog_job/editjob/<?php echo $jb['job_id'];?>.html">Edit</a>&nbsp;
						<a href="<?php echo site_url();?>bosslog_job/details/<?php echo $jb['job_id'];?>.html">Details</a>
					</td>
				</tr>
				<?php $i++;}?>
			</table>
	</div>
	<div class="twelve columns">
			<span class="textcolor">Go to page: <select name="pgselect"  onchange="gotopage(this.value,'<?php echo $currentpage;?>','<?php echo $databae_column.'_'.$sort_order;?>')">
							<?php for($i=1;$i<=$total_page;$i++){?>
								<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php }?>>&nbsp;<?php echo $i;?></option>
							<?php }?>
					</select>
			&nbsp;&nbsp;Page <b><?php echo $currentpage;?></b> of total <?php echo $total_page;?> pages&nbsp;&nbsp;		
	</div>
		
</div>	
<script type="text/javascript">
 function gotopage(pageno,urlname,sortandorder){
	
			document.location.href =jurl+"bosslog_job/viewjob/"+pageno+'/'+sortandorder+".html"; 
		  }
</script>
<?php $this->load->view("admin/footer");?>
