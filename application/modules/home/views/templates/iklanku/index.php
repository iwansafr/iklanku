<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<?php $class = 'fixed-top;' ?>
	<?php if ($mod['content'] != 'home/detail'): ?>
		<?php $class = ''; ?>
	<?php endif ?>
	<?php $this->load->view('menu_top',['class'=>$class]) ?>

	<?php $this->load->view($mod['content']);?>
	<script src="<?php echo base_url('templates/iklanku/') ?>jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('templates/iklanku/') ?>bootstrap/js/bootstrap.min.js"></script>
  <?php $this->load->view('script') ?>
</body>
</html>