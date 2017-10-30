<!DOCTYPE html>

<head>
    <title>Job<?php if($title!=''){echo " -".$title;}?></title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="" />


	<link href="<?php echo site_url()?>stylesheets/bosslog/normalize.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo site_url()?>stylesheets/bosslog/skeleton.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo site_url();?>stylesheets/font-awesome.min.css" rel="stylesheet">
	<!--<link href="<?php echo site_url()?>stylesheets/tables.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo site_url()?>stylesheets/tables-min.css" rel="stylesheet" type="text/css" />-->

	<link rel="icon" href="<?php echo site_url();?>images/favicon.png" />
	<script type="text/javascript" src="<?php echo site_url()?>js/jquery-1.9.1.min.js"></script>


	<link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url()?>js/jsdatepick/jsDatePick_ltr.css" />
	<script type="text/javascript" src="<?php echo site_url()?>js/jsdatepick/jsDatePick.full.1.3.js"></script>

	<!--<script type="text/javascript" src="<?php echo site_url();?>js/tinymce/tinymce.min.js"></script>-->
	<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
	<script>
	  tinymce.init({
	    selector: '#responsibility',
		theme: 'modern',
	    menubar: true,
	    plugins: "textcolor colorpicker",
		toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor',
	    width: 600,
    	height: 250,
    	browser_spellcheck: true

	  });
	  </script>


</head>
<script language="javascript" type="text/javascript">
			var jurl =  "<?php echo site_url()?>" ;
</script>
<body>
<div class="container">
	  <!-- columns should be the immediate child of a .row -->
  	<div class="row">
  		<div class="twelve columns">
			<h1 style="margin-bottom:0;padding-bottom:0;">Job</h1>
			<hr style="margin:2px 0px 3px 0px;">
		    <a class="boss_header" href="<?php echo site_url();?>" target=_blank <?php if($this->uri->segment(1)==''){?>class="linkhover"<?php }?>>Main Site</a>&nbsp;
		    <a class="boss_header" href="<?php echo site_url();?>bosslog/bosslog_dashboard.html" <?php if($this->uri->segment(1)==''){?>class="linkhover"<?php }?>>Dashboard</a>&nbsp;
			<a class="boss_header" href="<?php echo site_url();?>bosslog_job.html" <?php if($this->uri->segment(1)=='insert'){?>class="linkhover"<?php }?>>Insert Job</a>&nbsp;
			<a class="boss_header" href="<?php echo site_url();?>bosslog_job/viewjob.html" <?php if($this->uri->segment(1)=='insert'){?>class="linkhover"<?php }?>>View Joblist</a>&nbsp;
			<a class="boss_header" href="<?php echo site_url();?>bosslog_company/viewcompany.html" <?php if($this->uri->segment(1)=='article'){?>class="linkhover"<?php } ?>>Company List</a>&nbsp;
			<a class="boss_header" href="<?php echo site_url();?>bosslog_user/viewuser.html" <?php if($this->uri->segment(1)=='article'){?>class="linkhover"<?php } ?>>User List</a>&nbsp;
			<a class="boss_header" href="<?php echo site_url();?>bosslog_interview/viewinterview.html" <?php if($this->uri->segment(1)=='article'){?>class="linkhover"<?php } ?>>Interview</a>&nbsp;
			<a class="boss_header" href="<?php echo site_url();?>bosslog_resource/viewresource.html" <?php if($this->uri->segment(1)=='article'){?>class="linkhover"<?php } ?>>Resource</a>&nbsp;
			<a class="boss_header" href="<?php echo site_url();?>bosslog_settings/update_settings.html" <?php if($this->uri->segment(1)=='article'){?>class="linkhover"<?php } ?>>Site Config</a>&nbsp;
      <a class="boss_header" href="<?php echo site_url();?>bosslog_settings/advertise_list.html" <?php if($this->uri->segment(1)=='article'){?>class="linkhover"<?php } ?>>Advertise</a>&nbsp;	
			<a class="boss_header" href="<?php echo site_url();?>bosslog/logout.html" <?php if($this->uri->segment(1)=='article'){?>class="linkhover"<?php } ?>>Logout</a>
			<?php if($this->session->userdata('AUTHORITY')!=''){
				echo "<br>Logged in as <span style='color:blue;'>".$this->session->userdata('AUTHORITY')."</span>";
				}
			?>
			<?php //if($this->session->userdata('ID')!=''){?>
			<?php //} ?>
		</div>
	</div>
