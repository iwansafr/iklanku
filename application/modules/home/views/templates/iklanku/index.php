<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<div class="container">
		<?php $this->load->view('menu_top') ?>
		<?php 
		for($i = 0;$i<=500;$i++)
		{
			?>
			<hr>
			<?php
		}
		?>
	</div>
	<script src="<?php echo base_url('templates/iklanku/') ?>jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('templates/iklanku/') ?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>