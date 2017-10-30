<?php $this->load->view("admin/header");?>
<div class='row'>
	<div class='twelve columns'>	
		<?php $this->load->view("admin/submenu_job");?>
		<h3>Search Job</h3>
	</div>	
</div>

<div class='row'>
	<div class='twelve columns'>	
		<span id="msg" style="color:red;"></span>
			<h5>Basic Search</h5>
			<form id='searchjob' action="<?php echo site_url();?>bosslog_job/searchjob.html" method="post">
				<input type="text" name="sru" value="<?php echo set_value('sru'); ?>" size="60"> 
				&nbsp;
				<select name="rd">
					<option value="jobid" <?php if(set_value('rd')=='jobid') echo 'selected'; ?>>Job ID</option>
					<option value="jobname" <?php if(set_value('rd')=='jobname') echo 'selected'; ?>>Job Title</option>
					<option value="Part Time" <?php if(set_value('rd')=='Part Time') echo 'selected'; ?>>Part Time</option>
					<option value="Full Time" <?php if(set_value('rd')=='Full Time') echo 'selected'; ?>>Full Time</option>
					<option value="location" <?php if(set_value('rd')=='location') echo 'selected'; ?>>Job Location</option>
					<option value="last_date" <?php if(set_value('rd')=='last_date') echo 'selected'; ?>>Last Date of Apply(yyyy-mm-dd)</option>
					<option value="inactive" <?php if(set_value('rd')=='inactive') echo 'selected'; ?>>Inactive</option>										
				</select>
				
				<input type="hidden" name="btnsubmit" value="sbmt" >		
				<input type="button" name="srub" value="Search" onclick='myFunction()'>
				<br><br>		
				<span class="textcolor">Go to page: <select name="pgselect"  onchange="myFunction(this.value,'<?php echo $this->uri->segment(3);?>')">
							<?php for($i=1;$i<=$total_page;$i++){?>
								<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php }?>>&nbsp;<?php echo $i;?></option>
							<?php }?>
					</select>
			</span>
			</form>
	</div>
</div>	
<div class='row'>
	<div class='twelve columns'>	
		<?php if(!empty($job_list)>0){ ?>
		<table border="1" class="u-full-width">
			<tr>
				<td>job Id</td><td>Title</td><td>Nature</td>
				<td>Last Day</td><td>Status</td><td>Action</td>
			</tr>
			<?php $i=1; foreach($job_list as $jb){?>
				<tr <?php if($i%2==0){?>style="background:#CBBEAA;"<?php }?> >
					<td><?php echo $jb['job_id'];?></td>
					<td><?php echo $jb['job_title'];?></td>
					<td><?php echo $jb['job_nature'];?></td>
					<td><?php echo show_date($jb['last_date']);?></td>					
					<td><?php echo $jb['status'];?></td>
					<td><a href="<?php echo site_url();?>bosslog_job/editjob/<?php echo $jb['job_id'];?>.html">Edit</a>&nbsp;
							<a href="<?php echo site_url();?>bosslog_job/showjob/<?php echo $jb['job_id'];?>.html">Details</a>
					</td>
				</tr>
			<?php $i++;}?>
			</table>		
		<?php } ?>	
	</div>	
	
</div>	
<script type="text/javascript">
 	
	function myFunction() {
    	document.getElementById("searchjob").submit();
	}
 	function gotopage(pageno,sr_text){	
		//document.location.href =jurl+"bosslog_job/searchjob/"+sr_text+'/'+pageno+".html"; 
		document.getElementById("searchjob").submit();
	  }
</script>
<br>
<?php $this->load->view("admin/footer");?>