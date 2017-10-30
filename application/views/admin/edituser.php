<?php $this->load->view("admin/header");?>

<div class="row">
	<div class="eight columns">
		<span id="msg" style="color:red;"></span>
		<form action="<?php echo site_url();?>bosslog_user/edituser/<?php echo $arr['user_id'];?>.html" method="post">
			<!--<h4 style="color:blue">Additional Information</h4>-->
			
				<table class='u-full-width'>
					<tr><td><label class="">User's Name:</label></td>
						<td><input type="text" name="user_name" value="<?php echo $arr['user_name'];?>"></td>
					</tr>					
					<tr><td><label class="">Email:</label></td>
						<td><input type="text" name="email" value="<?php echo $arr['email'];?>"></td>
					</tr>
					<tr><td><label class="">Access ID:</label></td>
						<td><input type="text" name="access_id" value="<?php echo $arr['access_id'];?>"></td>
					</tr>
					<tr><td><label class="">Password:</label></td>
						<td><input type="text" name="password" value="<?php echo $arr['password'];?>"></td>
					</tr>
					<tr><td><label class="">Status:</label> </td>
						<td><select name="status">
							<option value="active" <?php if($arr['status']=='active') echo 'selected';?>>Active</option>
							<option value="inactive" <?php if($arr['status']=='inactive') echo 'selected';?>>Inactive</option>
						</select>
					</td>
				</table>
				<table>
					<tr><td><input type='submit' name="save" value="Save"></td></tr>	
				</table>	
					<!--
					<label class="">Access ID:</label> <?php echo $arr['access_id'];?><br>
					<label class="">Registration Date:</label> <?php echo show_date($arr['reg_date']);?><br>
					<label class="">Last Login:</label> <?php if($arr['last_login']!='0000-00-00'){echo show_date($arr['last_login']);}?><br>
					<?php $qr=$this->db->query("SELECT count(*) as num_job FROM `job_apply` WHERE user_id =$arr[user_id]");
						  $nr=$qr->row_array();	
					?>
					<label class="">Number of job the applied:</label>&nbsp;&nbsp;<u><?php echo $nr['num_job'];?></u><br>
					-->
			
		</form>
	</div>	
		
	
</div>	
<script type="text/javascript">
 function gotopage(pageno,urlname){
	
			document.location.href =jurl+"bosslog_user/viewuser/"+pageno+".html"; 
		  }
</script>
<br><br>
<?php $this->load->view("admin/footer");?>