<?php $this->load->view("admin/header");?>
<div class="row">
	<div class="twelve columns">
		<h3>Interview List</h3>
	</div>
</div>


<div class="row">
	<div class="twelve columns">
		<span id="msg" style="color:red;"></span>	
		<table border="1" class="u-full-width">
			<tr>
				<td>Id</td><td>Title</td><td>Person's info</td>
				<td>Status</td><td>Action</td>
			</tr>						
			<?php $i=1; foreach($interview_list as $jb){?>
				<tr <?php if($i%2==0){?>style="background:#CBBEAA;"<?php }?>>
					<td><?php echo $jb['interview_id'];?></td>
					<td><?php echo $jb['interview_title'];?></td>
					<td><?php echo substr($jb['person_info'],0,50);?></td>
					<td><?php echo $jb['status'];?></td>
					<td><a href="<?php echo site_url();?>bosslog_interview/editinterview/<?php echo $jb['interview_id'];?>.html">Edit</a>
							
					</td>
				</tr>
			<?php $i++;}?>
		</table>
	</div>	
	<div class="twelve columns">
		Go to page: <select name="pgselect"  onchange="gotopage(this.value,'<?php echo $this->uri->segment(3);?>')">
							<?php for($i=1;$i<=$total_page;$i++){?>
								<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php }?>>&nbsp;<?php echo $i;?></option>
							<?php }?>
					</select>
	</div>
	
</div>	
<script type="text/javascript">
 function gotopage(pageno,urlname){
	
			document.location.href =url+"bosslog_user/viewuser/"+pageno+".html"; 
		  }
</script>
<?php $this->load->view("admin/footer");?>