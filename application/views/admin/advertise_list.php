
<?php $this->load->view("admin/header");?>
<div class="row">
	<div class="twelve columns">
		<h3>Advertise List</h3>
	</div>
</div>


<div class="row">
	<div class="twelve columns">
			<table border="1" class='u-full-width'>
			<tr>
				<td>Id</td><td>Company</td><td>Image</td>
				<td>Publish Date </td><td>Exp. Day</td><td>Status</td><td>Action</td>
			</tr>
			<?php $i=1; foreach($a_list as $jb){?>
				<tr <?php if($i%2==0){?>style="background:#CBBEAA;"<?php }?>>
					<td><?php echo $jb['advertise_id'];?></td>
					<td><?php echo $jb['company'];?></td>
					<td><?php echo $jb['ad_image'];?></td>
					<td><?php echo show_date($jb['publish_date']);?></td>
					<td><?php echo show_date($jb['reg_date']);?></td>
					<td><?php echo $jb['status'];?></td>
					<td><a href="<?php echo site_url();?>bosslog_settings/advertise_update/<?php echo $jb['advertise_id'];?>.html">Edit</a>&nbsp;							
					</td>
				</tr>
			<?php $i++;}?>
			</table>
	</div>
	<div class='twelve columns'>

			</div>
	</div>


<script type="text/javascript">
 function gotopage(pageno,urlname){

			document.location.href =jurl+"bosslog_user/viewuser/"+pageno+".html";
		  }
</script>
<?php $this->load->view("admin/footer");?>
