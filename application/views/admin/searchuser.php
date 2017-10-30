<?php $this->load->view("admin/header");?>
<div class='row'>
	<div class='twelve columns'>	
		<?php $this->load->view("admin/submenu_user");?>
		<h3>Search List</h3>
	</div>	
</div>

<div class='row'>
	<div class='twelve columns'>	
		<span id="msg" style="color:red;"></span>
			<h5>Basic Search</h5>
			<form action="<?php echo site_url();?>bosslog_user/searchuser.html" method="post">
				<input type="text" name="sru" size="60"> 
				&nbsp;
				<select name="rd">
					<option value="userid">User ID</option>
					<option value="username">Username</option>
					<option value="mobile">Mobile</option>
					<option value="altmobile">Alternative Mobile</option>
					<option value="email">Email</option>
					<option value="inactive">Inactive User</option>
				</select>
				
				<input type="submit" name="srub" value="Search">		
			</form>
	</div>
</div>	
<div class='row'>
	<div class='twelve columns'>	
		<?php if(!empty($user_list)>0){ ?>
		<table border="1" class="u-full-width">
			<tr>
				<td>User Id</td><td>Name</td><td>access_id</td>
				<td>password</td><td>Reg. Day</td><td>Status</td><td>Action</td>
			</tr>
			<?php $i=1; foreach($user_list as $jb){?>
				<tr <?php if($i%2==0){?>style="background:#CBBEAA;"<?php }?> >
					<td><?php echo $jb['user_id'];?></td>
					<td><?php echo $jb['user_name'];?></td>
					<td><?php echo $jb['access_id'];?></td>
					<td><?php echo $jb['password'];?></td>
					<td><?php echo show_date($jb['reg_date']);?></td>					
					<td><?php echo $jb['status'];?></td>
					<td><a href="<?php echo site_url();?>bosslog_user/edituser/<?php echo $jb['user_id'];?>.html">Edit</a>&nbsp;
							<a href="<?php echo site_url();?>bosslog_user/showuser/<?php echo $jb['user_id'];?>.html">Details</a>
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