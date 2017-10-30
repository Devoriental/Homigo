<?php $this->load->view("admin/header");?>
<div class="row">
	<div class="twelve columns">
		<?php $this->load->view("admin/submenu_user");?>
		<h3>User List</h3>
	</div>		
</div>	


<div class="row">
	<div class="twelve columns">
			<table border="1" class='u-full-width'>
			<tr>
				<td>User Id</td><td>Name</td><td>access_id</td>
				<td>password</td><td>Reg. Day</td><td>Status</td><td>Action</td>
			</tr>						
			<?php $i=1; foreach($user_list as $jb){?>
				<tr <?php if($i%2==0){?>style="background:#CBBEAA;"<?php }?>>
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
	</div>		
	</div class='twelve columns'>		
			Go to page: <select name="pgselect"  onchange="gotopage(this.value,'<?php echo $this->uri->segment(3);?>')">
							<?php for($i=1;$i<=$total_page;$i++){?>
								<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php }?>>&nbsp;<?php echo $i;?></option>
							<?php }?>
					</select>
			</div>
	</div>	
	
</div>	
<script type="text/javascript">
 function gotopage(pageno,urlname){
	
			document.location.href =jurl+"bosslog_user/viewuser/"+pageno+".html"; 
		  }
</script>
<?php $this->load->view("admin/footer");?>