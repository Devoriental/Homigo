<?php $this->load->view("admin/header");?>
<br>

<h3>User List</h3>



<span id="msg" style="color:red;"></span>
<div style="border:0px solid green; width:810px">
	<div style="border:0px solid yellow; width:750px;float:left;">
			<label>Total <?php echo $totalrow;?> candidates</label>
			<table border="1">
			<tr>
				<td>User Id</td><td>User Name</td><td>Email</td><td>Mobile</td><td>Applied in</td><td>Action</td>
			</tr>						
			<?php $i=1; foreach($user_list as $jb){?>
				<tr <?php if($i%2==0){?>style="background:#CBBEAA;"<?php }?>>
					<td><?php echo $jb['user_id'];?></td>
					<td><?php echo $jb['user_name'];?></td>
					<td><?php echo $jb['email'];?></td>
					<td>
						<?php 
						$uid=$jb['user_id'];	
						$q=$this->db->query("select mobile from user_detail where user_id=$uid");
						$mb=$q->row_array();
						echo $mb['mobile']; ?>
					</td>
					
					<td><?php echo $jb['total_apply'];?> jobs</td>
					<td><a href="<?php echo site_url();?>bosslog_user/edituser/<?php echo $jb['user_id'];?>.html">Edit</a>&nbsp;
						<a href="<?php echo site_url();?>bosslog_user/showuser/<?php echo $jb['user_id'];?>.html">Details</a>								
					</td>
				</tr>	
			<?php }?>
			</table>
			
	</div>
	<div style="width:20%;margin-top:10px;">
			<span class="textcolor">Go to page: <select name="pgselect"  onchange="gotopage(this.value,'<?php echo $this->uri->segment(3);?>')">
							<?php for($i=1;$i<=$total_page;$i++){?>
								<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php }?>>&nbsp;<?php echo $i;?></option>
							<?php }?>
					</select>
	</div>
	
	<!--<div style="border:0px solid cyan; width:398px;float:left;">
			
	</div>	-->
	
</div>	
<script type="text/javascript">
 function gotopage(pageno,urlname){
	
			document.location.href =jurl+"bosslog_stats/applieduser/"+pageno+".html"; 
		}
</script>
<?php $this->load->view("admin/footer");?>
