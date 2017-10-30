<?php $this->load->view("admin/header");?>
<div class="row">
	<div class="twelve columns">
		<h5>Welcome</h5>
		<span id="msg" style="color:red;"><?php if($msg!=''){echo $msg;}?></span>

		<form action="" method="post">
			Authority:<br />
			<input type="text" name="authority"  size="25" /><br><br>
			User Name/ID:<br />
			<input type="text" name="username"  size="25" /><br><br>
			Password:<br />
			<input type="password" name="pass"  size="25" /><br /><br />
			<input type="submit" name="login" value="Login" />
		</form>
		
		
	</div>
</div>	
	


<?php $this->load->view("admin/footer");?>
