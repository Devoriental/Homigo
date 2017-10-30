<?php $this->load->view("admin/header");?>
<br>
<?php $this->load->view("admin/submenu_company");?>
<div class="row">
	<div class="twelve columns"><h3>Company List</h3></div>
</div>

<div class="row">
	<div class="twelve columns">		
			<table class="u-full-width" border="1">
			<tr>
				<th>Company Id</th><th>Company</th><th>Real Name</th><th>email</th>
				<th>password</th><th>Reg. Date</th><th>Status</th><th>Action</th>
			</tr>						
			<?php $i=1; foreach($company_list as $jb){?>
				<tr <?php if($i%2==0){?>style="background:grey;"<?php }?>>
					<td><?php echo $jb['company_id'];?></td>
					<td><?php echo $jb['company_name'];?></td>
					<td><?php echo $jb['company_real_name'];?></td>
					<td><?php echo $jb['email'];?></td>
					<td><?php echo $jb['password'];?></td>
					<td><?php echo $jb['reg_date'];?></td>					
					<td><?php echo $jb['status'];?></td>
					<td><a href="<?php echo site_url();?>bosslog_company/editcompany/<?php echo $jb['company_id'];?>.html">Edit</a>&nbsp;&nbsp;<a href="">Details</a></td>
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
	
			document.location.href =jurl+"bosslog_company/viewcompany/"+pageno+".html"; 
		  }
</script>
<?php $this->load->view("admin/footer");?>