<?php $this->load->view("header");?>
<section id="statistics">
	<div class="container">
		<div class="center wow fadeInDown">
			<h3>Summary List of <span style='color:#EE161F'><?php echo $job_info['job_title'];?></span></h3>
		</div>
		<?php 
			$current_year=date('Y');
			$nature='';
			if(count($a)>0):
				$nature=$a['nature'];   $y=$a['yr'];	$m=$a['mo'];	$d=$a['da'];
			endif;
		?>			
		<div class="row">
			<?php //$this->load->view("companyprofile/company_profile_submenu");?>
			
			<div class="col-sm-12">
				<span class="textcolor">
					&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/summary/<?php echo $job_info['job_id'];?>/1.html"><i class="fa fa-angle-double-left fa-lg"></i></a>
					&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/summary/<?php echo $job_info['job_id'];?>/<?php echo $currentpage-1;?>.html"><i class="fa fa-angle-left fa-lg"></i></a>

					&nbsp;&nbsp;Showing <?php echo $start+1;//$currentpage;?> - <?php echo $start+$limit_per_page;?> of total <?php echo $total_data;//$total_page;?> candidates&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/summary/<?php echo $job_info['job_id'];?>/<?php echo $currentpage+1;?>.html"><i class="fa fa-angle-right fa-lg"></i></a>
					&nbsp;&nbsp;
					<a href="<?php echo site_url();?>companyprofile/summary/<?php echo $job_info['job_id'];?>/<?php echo $total_page;?>.html"><i class="fa fa-angle-double-right fa-lg"></i></a>				
				</select>
				</span>		
				<table class='table-bordered'>
					<thead style='font-weight:bold;'><tr>
						<td>SL</td>
						<td>Name & Contact</td>
						<!--<td>Gender</td>-->
						<td>Education</td>
						<td>Job</td>
						</tr>
					</thead>
				<?php 
					$counting=$this->uri->segment(4,1);	
					$counting=($counting-1)*$limit_per_page+1;
					$i=0; foreach($candidate_list as $jb){
				//	$comp=$this->common->get_table_data(1,'company'," where company_id=$jb[company_id]"," ");
				?>
				<?php 
						$uid=$jb['user_id'];
						$q=$this->db->query("select mobile,address,gender from user_detail where user_id=$uid");
						$mb=$q->row_array();
						//sprint_r($mb);
					?>	
				<tr >
					<td valign="top"><?php echo $counting+$i;?></td>	
					<td valign="top">
					<?php if($jb['photo']!=''):?>
					<img src="<?php echo site_url().'images/profileimage/'.$jb['photo'];?>" alt='<?php echo $jb['photo'];?>' width='60' height='60'><br>
					<?php endif;?>		
					<span style='color:#EE161F;'><?php echo $jb['user_name'];?></span><br>
					<?php echo $mb['gender'];?><br>
					<?php if($jb['email']!=''):?>
						Email: <?php echo $jb['email'];?><br>
					<?php endif;?>	
					
					Mobile: <?php echo $mb['mobile'];?><br><br>
							<?php echo $mb['address'];?>
					</td>					
					<!--<?php echo $jb['job_description'];?><br>
					<?php echo $jb['job_nature'];?><br>
					<?php echo $jb['job_location'];?><br>
					<?php echo $jb['education'];?><br>
					<?php echo $jb['salary'];?><br>-->
					
					<!--<td valign="top"></td>-->
					<?php 
						$uid=$jb['user_id'];	
						$e=$this->db->query("select degree_title,institution from user_education where user_id=$uid order by degree_id desc");
						$eb=$e->result_array();
					?>
					<td valign="top">
						<?php if(count($eb)>0){?><span style='color:#EE161F;'><?php echo $eb[0]['degree_title'];?></span><br>
								<?php echo $eb[0]['institution'];
						 } ?>
						
					</td>
					<?php 
						$uid=$jb['user_id'];	
						$w=$this->db->query("select company_name,designation,job_start,job_end from user_work where user_id=$uid order by job_end desc");
						//$wb=$w->row_array();						
						$wb=$w->result_array();						
						/*	<td><?php if(count($wb)>0)echo $wb['designation'];?></td>
					 	//<td><?php if(count($wb)>0)echo $wb['company_name'];?></td>*/
					?>
					<td valign="top">
					<?php if(count($w)>0){foreach($wb as $w){?>
						<span style='color:#EE161F;'><?php echo $w['designation'];?><br></span>
						<?php echo $w['company_name'];?><br>						
						<span style='font-style:italic;'><?php if($w['job_start']!='0000-00-00')echo show_date($w['job_start'],'d/m/Y'); if($w['job_end']!='0000-00-00') {echo ' - '.show_date($w['job_end'],'d/m/Y');}else echo " - still continuing"?></span><br>
					<?php }} else {?>
					NA<br>
					NA<br>
					<?php } ?>
					</td>
				</tr>
				<?php $i++;}?>
				</table>
				<span class="textcolor">
					<br>Go to page: 
					<select name="pgselect"  onchange="gotopage(this.value,'<?php echo $jb['job_id'];?>','<?php echo $this->uri->segment(3)?>')">
								<?php for($i=1;$i<=$total_page;$i++){?>
									<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php }?>>&nbsp;<?php echo $i;?></option>
								<?php } ?>
					</select>
				</span>	
			</div>
				
		
		</div>	


	</div>
</section>		
			
<script type="text/javascript">
 function gotopage(pageno,jobid,urlname){
				document.location.href =jurl+"companyprofile/summary/"+jobid+"/"+pageno+".html"; 
		  }
</script>			
<?php $this->load->view("footer");?>