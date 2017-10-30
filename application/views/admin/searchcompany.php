<?php $this->load->view("admin/header");?>
<br>
<div class="row">
	<div class="nine columns">
		<?php $this->load->view("admin/submenu_company");?>
		<h3>Company Search List</h3>
	</div>
</div>		


<div class="row">
	<div class="nine columns">
		<span id="msg" style="color:red;"></span>
			<h5>Basic Search</h5>
			<form action="<?php echo site_url();?>bosslog_company/searchcompany.html" method="post">
				<input type="text" name="sru" size="60"> 
				&nbsp;
				<select name="rd">
					<option value="companyid">Company ID</option>
					<option value="companyname">Company Name</option>
					<option value="companyrealname">Company Real Name</option>
					<option value="inactive">Inactive Company</option>
				</select>
				
				<input type="submit" name="srub" value="Search">		
			</form>
	</div>
</div>
<div class="row">	
	<div class="ten columns">
		<?php if(!empty($company_list)>0){ ?>
		<table border="1" class='u-full-width'>
			<tr>
				<td>User Id</td><td>Name</td><td>Real Name</td><td>access_id</td>
				<td>password</td><td>Reg. Day</td><td>Status</td><td>Action</td>
			</tr>
			<?php $i=1; foreach($company_list as $jb){?>
				<tr <?php if($i%2==0){?>style="background:#CBBEAA;"<?php }?> >
					<td><?php echo $jb['company_id'];?></td>
					<td><?php echo $jb['company_name'];?></td>
					<td><?php echo $jb['company_real_name'];?></td>
					<td><?php echo $jb['email'];?></td>
					<td><?php echo $jb['password'];?></td>
					<td><?php echo show_date($jb['reg_date']);?></td>					
					<td><?php echo $jb['status'];?></td>
					<td><a href="<?php echo site_url();?>bosslog_company/editcompany/<?php echo $jb['company_id'];?>.html">Edit</a>&nbsp;
							<a href="<?php echo site_url();?>bosslog_company/showuser/<?php echo $jb['company_id'];?>.html">Details</a>
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