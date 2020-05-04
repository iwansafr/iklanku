<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<?php $this->load->view('menu_top') ?>
	<?php $this->load->view($mod['content']);?>
	<script src="<?php echo base_url('templates/iklanku/') ?>jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('templates/iklanku/') ?>bootstrap/js/bootstrap.min.js"></script>
  <?php $this->load->view('script') ?>
</body>
</html>