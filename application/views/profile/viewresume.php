<!DOCTYPE html>
<html lang="en">
<head>
    <title>Journeymakerjobs<?php if($title!=''){echo " -".$title;}?></title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    
  
  <meta property="og:type"            content="social-cookbook:recipe" /> 
  <meta property="og:url"             content="<?php echo current_url();?>" /> 
  <meta property="og:title"           content="Jobs<?php if($title!=''){echo " -".$title;}?>" /> 
  <meta property="og:image"           content="http://www.journeymakerjobs.com/images/facebook_logo.jpg" /> 
  <!--<meta property="cookbook:author"    content="http://samples.ogp.me/390580850990722" />-->
  <meta property="og:description" content="<?php if($description!=''){echo $description;}else{?>Jobs<?php }?>"/>

    <!--Facebook Meta end-->
      
  <!-- Mobile Specific Metas
  ================================================== -->
    <link href="<?php echo site_url();?>stylesheets/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo site_url();?>stylesheets/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo site_url();?>stylesheets/animate.min.css" rel="stylesheet">
    <link href="<?php echo site_url();?>stylesheets/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo site_url();?>stylesheets/main.css" rel="stylesheet">
    <link href="<?php echo site_url();?>stylesheets/responsive.css" rel="stylesheet">
   <!-- <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Simonetta:400,900|Balthazar">-->
  <!--[if lt IE 9]>
    <script src="<?php echo site_url()?>/js/html5shiv.js"></script>
  <![endif]-->
  <!-- Favicons 
  ================================================== -->
  <link rel="shortcut icon" href="<?php echo site_url()?>images/favicon.ico">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  <!-- Jquery/javascript
  ================================================== -->
  <script src="<?php echo site_url();?>js/jquery-1.11.1.min.js"></script>

  
</head>
<script language="javascript" type="text/javascript">
      var url =  "<?php echo site_url();?>" ;
</script>

<body>
<section id="my-resume">
  <div class="container">
      <div class="row" >
        <div class="col-sm-2" style="border:0px solid #777777;min-height:100px;">
                &nbsp;
        </div>
        <div class="col-sm-8" style="border:1px solid #BFBFBF;background:#;border-radius:.5em">
             <div class="col-sm-12" style="border:0px solid red;">
                <div class="col-sm-8" style="margin-top:15px;border:0px solid red;text-align:left;">
                    <span style="font-weight:bold;font-size:28px;"><?php echo $arr['user_name'];?></span><br>
                    <?php echo $detail_arr['address'];?><br>
                    <?php echo $arr['email'];?><br>
                    <?php echo $detail_arr['mobile'];?>
                </div>
                <div class="col-sm-4" style="margin-top:15px;border:0px solid red;">
                  <?php if($arr['photo']!=''){?>
                    <img class="img-rounded" src="<?php echo site_url()?>images/profileimage/<?php echo $arr['photo'];?>" width='160' height='165'>
                    <br> 
                  <?php }else {?>
                    <img class="img-le" src="<?php echo site_url()?>images/defaultphoto.jpg" width='160' height='165'><br>
                    <!--<div style="text-align:center;width:150px;height:155px;border:3px solid white;background:#b3b3ac;border-radius:.3em">
                      <p style="text-align:center;margin-top:50px;font-size:20px;">Your Photo</p>
                    </div>-->
                  <?php }?>                     
                </div>  
                
         </div>
        <div>&nbsp;</div>

        <?php if($detail_arr['objective']!=''){?>
          <h4 style="margin-right:0px;padding-right:0px;color:#C52D2F;text-align:justify;">Career Objective</h4>
          <hr style="margin-top:0px;border:1px solid #A6A6A6;">
          <?php echo $detail_arr['objective'];?>
          <br><br>
        <?php }?>   

        <?php if(count($emp_arr)>0){ ?>
          <h4 style="margin-right:0px;padding-right:0px;color:#C52D2F;">Work Experience</h4>
          <hr style="margin-top:0px;border:1px solid #A6A6A6;">
          <div class="myresume_div mrfont">
            <?php foreach ($emp_arr as $wr) {
                  /*----------First show recent job---------*/
              if($wr['job_end']=='0000-00-00'){
              ?>
            <label style="">Designation: </label> &nbsp;<?php echo $wr['designation'];?><br>
            Company/Organization: <?php echo $wr['company_name'];?><br>
            Responsibility: <?php echo nl2br($wr['responsibility']);?><br>
            Duration: <?php if($wr['job_start']!='0000-00-00'){?>
              From <?php echo show_date($wr['job_start']); 
              if($wr['job_end']!='0000-00-00'){?> to <?php echo show_date($wr['job_end']);} else echo " - Still Continuing";?>
               <br>
            <?php } else
             echo 'N/A<br>';?>
            <br>
            <?php } }?>  

            <?php foreach ($emp_arr as $wr) {
                /*---------Now show previous job experience in descending order---------*/
              if($wr['job_end']!='0000-00-00'){ 
              ?>
            <label style="">Designation: </label> &nbsp;<?php echo $wr['designation'];?><br>
            Company/Organization: <?php echo $wr['company_name'];?><br>
            Responsibility: <?php echo nl2br($wr['responsibility']);?><br>
            Duration: <?php if($wr['job_start']!='0000-00-00'){?> 
              From <?php echo show_date($wr['job_start']); if($wr['job_end']!='0000-00-00'){?> to 
              <?php echo show_date($wr['job_end']);} else echo " - Still Continuing";?>
              (<?php $thedate=date_difference($wr['job_end'],$wr['job_start']);
                  $dd=explode('-', $thedate); 
                  if($dd['0']!=0){echo $dd['0']; if($dd['0']==1) echo ' year'; else echo ' years';}
                  echo "&nbsp;";
                  if($dd['1']!=0){echo $dd['1']; if($dd['1']==1) echo ' month'; else echo ' months';}
              ?>)
              <br>
            <?php }else
             echo 'N/A<br>';?>
            <br>
            <?php } }?>          
          </div>  
        <?php }?>  

         <?php if(count($edu_arr)>0){?>
        <h4 style="margin-right:0px;padding-right:0px;color:#C52D2F;">Education</h4>
        <hr style="margin-top:0px;border:1px solid #A6A6A6;">
        <div class="myresume_div mrfont">  
          <?php foreach ($edu_arr as $er) {
              $dr=$this->common->get_table_data(1,'degree'," where degree_id=$er[degree_id]"," ");
            ?>
            <h5 class="" style="margin-bottom:0px;"><?php echo $dr['degree_name'];?></h5>
            <?php echo $er['degree_title'];?><br>
            <?php if($er['institution']!=''){?>
              Institution: <?php echo $er['institution'];?><br>
            <?php }?> 
            <?php if($er['major']!=''){?> 
              Subject/Major: <?php echo $er['major'];?><br>
            <?php }?>  
            <?php if($er['result']!=''){?> 
              Result: <?php echo $er['result'];?>
            <?php }?>  
            <?php if($er['semester']!=''){?><?php echo $er['semester'];?><?php }?>
            <br>
            <?php if($er['pass_year']!=''){?>Year of pass/Academic Year: <?php echo $er['pass_year'];?><?php }?><br><br>
            
          <?php }?>          
        </div>  
        <?php } ?>
        <br><br>

        <h4 style="margin-right:0px;padding-right:0px;color:#C52D2F;">Personal Details</h4>
        <hr style="margin-top:0px;border:1px solid #A6A6A6;">
        <div class="myresume_div mrfont">
         
          <table border="0" width="60%">
          <tr><td>Name:</td><td>:&nbsp;<?php echo $arr['user_name'];?></td></tr>
          <tr><td>Email:</td><td>:&nbsp;<?php echo $arr['email'];?></td></tr>
          <?php if(count($detail_arr)>0){?>
            <?php if($detail_arr['father_name']!=''){?>
              <tr><td>Father's Name</td><td>:&nbsp;<?php echo $detail_arr['father_name'];?></td></tr>
            <?php }?>  
            <?php if($detail_arr['mother_name']!=''){?>
              <tr><td>Mother's Name</td><td>:&nbsp;<?php echo $detail_arr['mother_name'];?></td></tr>
            <?php }?>
            <tr><td valign="top">Address</td><td>:&nbsp;<?php echo $detail_arr['address'];?></td></tr>
            <tr><td>Date of Birth </td><td>:&nbsp;<?php echo show_date($detail_arr['birth_date']);?></td></tr>
            <tr><td>Mobile</td><td>:&nbsp;<?php echo $detail_arr['mobile'];?></td></tr>
            <?php if($detail_arr['alt_mobile']!=''){?>
              <tr><td>Alternate Mobile</td><td>:&nbsp;<?php echo $detail_arr['alt_mobile'];?></td></tr>
            <?php }?>  
            <?php if($detail_arr['national_id']!=''){?>
              <tr><td>National ID</td><td>:&nbsp;<?php echo $detail_arr['national_id'];?></td></tr>
            <?php }?>  
            <?php if($detail_arr['facebook_id']!=''){?>
              <tr><td>Facebook ID</td><td>:&nbsp;<?php echo $detail_arr['facebook_id'];?></td></tr>
            <?php }?>    
            <tr><td>Gender</td><td>:&nbsp;<?php echo $detail_arr['gender'];?></td></tr>
            <?php if($detail_arr['marital_status']!=''){?>
              <tr><td>Marital Status</td><td>:&nbsp;<?php echo $detail_arr['marital_status'];?></td></tr>
            <?php }?>      
            <tr><td valign="top"></td></tr>

          <?php }?>
          </table>
        </div><br>
      
      
        <?php if(count($tra_arr)>0){?>  
          <h4 style="color:#C52D2F;">Training</h4>
          <hr style="margin-top:0px;border:1px solid #A6A6A6;">
          <div class="myresume_div mrfont">       
            <?php 
              foreach ($tra_arr as $tr) {       
              ?>
              <label class="" style=""><?php echo $tr['training_title'];?></label><br>
              <?php if($tr['institution']!=''){?>
                Institution: <?php echo $tr['institution'];?><br>
              <?php }?>  
              <?php if($tr['topic_details']!=''){?>
                Topic Details: <?php echo $tr['topic_details'];?><br>
              <?php }?>  
              <?php if($tr['location']!=''){?>
                Location: <?php echo $tr['location'];?><br>
              <?php }?>  
              <?php if($tr['location']!=''){?>
                Duration: <?php echo $tr['duration'];?>
              <?php }?>  
              <br><br>
            <?php }?>
          </div>  
        <?php }?>
        <?php if(count($ach_arr)>0){?>  
          <h4 style="color:#C52D2F;">Achievement</h4>
          <hr style="margin-top:0px;border:1px solid #A6A6A6;">
          <div class="myresume_div mrfont">       
            <?php 
              foreach ($ach_arr as $ar) {       
              ?>
              
              <?php if($ar['achievement']!=''){?>
                 <?php echo $ar['achievement'];?><br>
              <?php }?>                
              <br><br>
            <?php }?>
          </div>  
        <?php }?>


        <?php if(count($detail_arr)>0):?>
        <h4 style="color:#C52D2F;">Your desired job</h4>
        <hr style="margin-top:0px;border:1px solid #A6A6A6;">
        <div class="myresume_div mrfont">        
            <?php           
              $desired_job=explode('-', $detail_arr['desired_job']);

              for($i=0;$i<count($desired_job)-1;$i++){
                $jid=$desired_job[$i];  
                $dsql="select * from job_category where job_category_id=$jid";
                $query=$this->db->query($dsql);
                $cat_name=$query->row_array();
                echo "<i class='fa fa-circle'></i>&nbsp;";
                echo $cat_name['category_name'].'&nbsp;&nbsp;&nbsp;&nbsp;';
              }                 
            ?>
            <br><br>      
        </div>
      <?php endif; ?>


     <?php if($detail_arr['reference']!=''):?>
        <h4 style="color:#C52D2F;">Reference</h4>
        <hr style="margin-top:0px;border:1px solid #A6A6A6;">
        <div class="myresume_div mrfont">        
            <p><?php echo nl2br($detail_arr['reference']);?></p>            
        </div>
      <?php endif; ?>
      </div> 
      </div>
  </div>
</section>  


</body>
</html>

        