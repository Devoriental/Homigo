<?php $this->load->view("header");?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<section id="job-detail" style="border:0px solid green;">
    <div class="container" style="border:0px solid red;">
		<div class="center">
                 <!--<a href="http://www.nreach.net.bd/"><img src="<?php echo site_url();?>images/adimage/nitol-niloy.jpg" class="img-responsive" style='text-align:center;'></a><br>-->
                <h2>Job Details</h2>
		</div>

		<div class="col-md-8 col-sm-6" style="border:0px solid yellow;margin-bottom:0px;">

			<?php if($company['photo']!=''){?>
				<img src="<?php echo site_url();?>images/companylogo/<?php echo $company[photo]?>" class="img-responsive"><br>
			<?php }?>
			<div class="fb-share-button" data-href="<?php echo site_url();?>job/detail/<?php echo $job_detail['job_id'];?>.html" data-layout="button"></div>
			<h4 style="color:#C52D2F;"><?php echo $job_detail['job_title'];?></h4>
			<h5 style="font-weight:bold;"><?php echo $company['company_name'];?></h5>

			<br>

			<h5 style="font-weight:bold;">Responsibility:</h6>
			<p><?php echo nl2br($job_detail['job_description']);?></p>

			<br>

			<h5 style="font-weight:bold;">Additional Information:</h6>
			<p><?php echo nl2br($job_detail['additional_info']);?></p>

			<br>
			<h5 style="font-weight:bold;">Education:</h5>
			<p><?php echo nl2br($job_detail['education']);?></p>

			<br>

			<h5 style="font-weight:bold;">Experience:</h5>
			<p><?php echo nl2br($job_detail['experience']);?></p>

			<br>

			<h5 style="font-weight:bold;">Job Location:</h5>
			<p><?php echo $job_detail['job_location'];?></p>

			<br>

			<h5 style="font-weight:bold;">Job Nature:</h5>
			<p><?php echo $job_detail['job_nature'];?></p>

			<br>

			<h5 style="font-weight:bold;">Salary:</h5>
			<p><?php echo $job_detail['salary'];?></p>

			<br>
			<?php if($job_detail['vacancy']!=0):?>

				<h5 style="font-weight:bold;">Number of Vacancy:</h5>
				<p><?php echo $job_detail['vacancy'];?></p>

				<br>
			<?php endif; ?>

			<h5 style="font-weight:bold;">Deadline:</h5>
			<?php
				//$dr=explode('-',$job_detail['last_date']);
				//echo date('F j, Y',gmmktime(0, 0, 0, $dr['1'], $dr['2'], $dr['0']));
				echo show_date($job_detail['last_date']);
				echo "<br><br>";
			?>
			
			<?php if($company['company_info']!=''){?>
				<h5 style="font-weight:bold;">Company Information:</h5>
				<p><?php echo $company['company_info'];?></p>
			<?php }?>	
			
			<br><br>
			<!--<form action="<?php echo site_url()?>/job/applyjob.html" method="post"> -->
				<input type="hidden" name="job_id" value="<?php echo $job_detail['job_id']?>" >
				<?php

					$applyindicator=1;
							// below 3 lines chekcing whether the job is expired or not
					//$dt=date_create(current_date());
					//date_add($dt,date_interval_create_from_date_string("1 days"));
					//echo $ex_date=date_format($dt,"Y-m-d");

					$dr=$this->db->query("SELECT DATE_ADD('$job_detail[last_date]',INTERVAL 1 day) as t ");
					$thedt=$dr->row_array();
					$difference = strtotime(current_date())-strtotime($thedt['t']);
					$yrs = floor($difference / (365*24*60*60));
					if($yrs>=0)$applyindicator=0;

					if($this->session->userdata('ID')!=''){
						$user_id=$this->session->userdata('ID');
						$job_id=$job_detail['job_id'];
						$jrr=$this->common->get_table_data(1,'job_apply'," where job_id=$job_id and user_id=$user_id"," ");
						if(count($jrr)>0):
							echo "You have already applied this job.";
							$applyindicator=0;
						endif;
					}
				?>

				<?php if($applyindicator==1):?>
					<input type="submit" name="apply" value="Apply Now" class="btn btn-primary btn-lg" onclick="dowork('<?php echo site_url()?>','<?php echo $job_detail['job_id']?>');">

				<?php endif; ?>
				<br><br>
		</div>
		<div class="col-md-4 col-sm-4" style="border:0px solid yellow;">

				<img style="margin-bottom:10px;border:1px solid black;" alt ='Dgstudy' src="<?php echo site_url();?>images/adimage/dgstudy.jpg" />
				<img style="margin-bottom:10px;border:1px solid black;" alt ='Lexis' src="<?php echo site_url();?>images/adimage/lexis.jpg" />
				<img style="margin-bottom:10px;border:1px solid black;" alt ='Jafflong Inn' src="<?php echo site_url();?>images/adimage/jafflonginn.jpg" />
				<a href='http://mucbd.com/' target='_blanck'><img style="margin-bottom:10px;border:1px solid black;" alt ='Mornington University College' src="<?php echo site_url();?>images/adimage/mornington.jpg" /></a>

			<!--	<img style="border:1px solid black;" src="<?php echo site_url();?>images/adimage/290.png" />
			-->
		</div>

	</div>
   </section>




<script type="text/javascript">

	function dowork(theurl,job_id){

		document.location.href=theurl+'job/applyjob/'+job_id+'.html';

	}
</script>
<?php $this->load->view("footer");?>
