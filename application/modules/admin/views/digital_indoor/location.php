<?php if (!empty($data)): ?>
	<div class="row">
		<div class="col-md-3">
			<a href="<?php echo base_url('admin/digital_indoor/location') ?>" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus"></i> new Location</a>
			<?php $this->load->view('location_edit') ?>
		</div>
		<div class="col-md-9">
			<?php $this->load->view('location_list') ?>
		</div>
	</div>
<?php else: ?>
	<?php msg('request tidak valid','danger') ?>
<?php endif ?>