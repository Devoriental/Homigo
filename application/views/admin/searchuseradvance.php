<?php $this->load->view("admin/header");?>
<div class='row'>
	<div class='twelve columns'>	
		<?php $this->load->view("admin/submenu_user");?>
		<h3>Advance Search List</h3>
	</div>	
</div>
<div class='row'>
	<div class='twelve columns'>	
		<span id="msg" style="color:red;"></span>			
		<form action="<?php echo site_url();?>bosslog_user/searchuseradvance.html" method="post">
				<label>Address:</label>
				<input type="text" name="address" size="60"> 
				<br>
				<label>Degree Title:</label>
				<input type="text" name="degree" size="60"> 
				<br>
				<label>Institution:</label>
				<input type="text" name="inst" size="60"> 
				<br>
				<label>Company:</label>
				<input type="text" name="company" size="60"> 
				<br>
				<label>Designation:</label>
				<input type="text" name="desig" size="60"> 
				<br>
				<input type="submit" name="srub" value="Search">		
		</form>
	</div>
</div>	
<div class='row'>
	<div class='twelve columns'>
		<?php if(!empty($user_list)>0){ ?>
		<table border="1" class="u-full-width">
			<tr>
				<td>User Id</td><td>Name</td>
				<td>Status</td><td>Action</td>
			</tr>
			<?php $i=1; foreach($user_list as $jb){ ?>
				<tr <?php if($i%2==0){?>style="background:#CBBEAA;"<?php }?> >
					<?php $ur=$this->common->get_table_data(1,' user'," where user_id=$jb[user_id]");?>
					<td><?php echo $jb['user_id'];?></td>
					<td><?php echo $ur['user_name'];?></td>
					
					<td><?php echo $ur['status'];?></td>
					<td><a href="<?php echo site_url();?>bosslog_user/edituser/<?php echo $ur['user_id'];?>.html">Edit</a>&nbsp;
							<a href="<?php echo site_url();?>bosslog_user/showuser/<?php echo $ur['user_id'];?>.html">Details</a>
					</td>
				</tr>
			<?php $i++;}?>
			</table>
		<?php } ?>	
	</div>
</div>	

<script type="text/javascript">
 function gotopage(pageno,urlname){
	
			document.location.href =jurl+"bosslog_user/viewuser/"+pageno+".html"; 
		  }
</script>
<br>
<?php $this->load->view("admin/footer");?>