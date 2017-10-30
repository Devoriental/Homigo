<?php $this->load->view("header");?>
  	<section id="all-job">
        <div class="container" style="border:0px solid red;">
        	<div class="center">  
                <h2>Tips & Trics</h2>
			</div>		
		  
			<?php $i=1;foreach ($tip_list as $ct): ?>
				<div class="col-xs-8" style="border:0px dashed black;margin-bottom:25px;">
					<?php 
                       // $query=$this->db->query("select company_name,photo from company where company_id=$ct[company_id]"); 
                       // $crr=$query->row_array();
                       // $cphoto='jobopening.png';
                       // if($crr['photo']!='')$cphoto=$crr['photo'];
                    ?>
                    <div class="col-xs-6" style="border:0px solid red;margin-top:12px;">
                    	<?php if($ct['tips_photo']!=''):?>
                      		<img class="img-responsive" src="<?php echo site_url();?>images/tips/<?php echo $ct['tips_photo'];?>">
                      	<?php endif;?>
                     </div> 
                    <div class="col-xs-10" style="border:0px solid red;margin-top:12px;">   
						<h4 style="padding-top:0px;margin-top:0px;width:100%;">						
							<a href="<?php echo site_url()?>tips/detail/<?php echo $ct['tips_id'];?>.html" target=_blank><?php echo $ct['tips_title'];?></a>
						</h4>
						<label class='label label-default'>Posted on: <?php echo show_date($ct['tips_date']);?></label>
						
					</div>		
				</div>
			<?php $i++; endforeach ?>	

			<div class="col-xs-8" style="border:0px solid red;text-align:center;margin-bottom:0px;">
					<span class="textcolor">Go to page: <select name="pgselect"  onchange="gotopage(this.value,'<?php echo $this->uri->segment(3)?>')">
							<?for($i=1;$i<=$total_page;$i++){?>
								<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php } ?>>&nbsp;<?php echo $i;?></option>
							<?}?>
						</select>
						&nbsp;&nbsp;
						<a href="<?php echo site_url();?>job/alljob/1.html"><i class="fa fa-angle-double-left fa-lg"></i></a>
						&nbsp;&nbsp;
						<a href="<?php echo site_url();?>job/alljob/<?php echo $currentpage-1;?>.html"><i class="fa fa-angle-left fa-lg"></i></a>

						&nbsp;&nbsp;Page <?php echo $currentpage;?> of <?php echo $total_page;?>&nbsp;&nbsp;
						<a href="<?php echo site_url();?>job/alljob/<?php echo $currentpage+1;?>.html"><i class="fa fa-angle-right fa-lg"></i></a>
						&nbsp;&nbsp;
						<a href="<?php echo site_url();?>job/alljob/<?php echo $total_page;?>.html"><i class="fa fa-angle-double-right fa-lg"></i></a>
					</span>	
				</div>	
			
        </div>
    </section>    	

   
   	
<script type="text/javascript">
 	function gotopage(pageno,urlname){
	
			document.location.href =jurl+"job/alljob/"+pageno+".html"; 
	  }
</script>	
 
<?php $this->load->view("footer");?>		
