<div class="row">
	<div class="col-md-3">
		<a href="<?php echo base_url('admin/digital_indoor/venue') ?>" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus"></i> new Venue</a>
		<?php $this->load->view('venue_edit') ?>
	</div>
	<div class="col-md-9">
		<?php $this->load->view('venue_list') ?>
	</div>
</div>