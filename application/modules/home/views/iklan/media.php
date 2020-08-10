<style type="text/css">
	body{
		background-color: #F7F7F8!important;
	}
	.img{
		max-width: 50%;
	}
</style>
<div class="container mt-5 mt-5 pt-5">
	<div class="row">
		<div class="col text-center">
			<a href="<?php echo base_url('home/iklan') ?>">
				<img src="<?php echo base_url('images/ooh_active.png') ?>" class="img img-fluid img-circle">
				<p style="text-align: center;">OUT OF HOME<br>MEDIA</p>
			</a>
		</div>
		<div class="col text-center">
			<a href="#" data-toggle="modal" data-target="#sosmedModal">
				<img src="<?php echo base_url('images/sosmed_disabled.png') ?>" class="img img-fluid img-circle">
				<p class="disabled" style="text-align: center;">SOCIAL MEDIA CAMPAIGN</p>
			</a>
			<div class="modal fade" id="sosmedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<h5>UNDERCONSTRUCTION</h5>
			      </div>
			      <div class="modal-footer">
			        
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col text-center">
			<a href="#" data-toggle="modal" data-target="#sosmedModal">
				<img src="<?php echo base_url('images/radio_disabled.png') ?>" class="img img-fluid img-circle">
				<p class="disabled" style="text-align: center;">IKLAN RADIO</p>
			</a>
		</div>
		<div class="col text-center">
			<a href="#" data-toggle="modal" data-target="#sosmedModal">
				<img src="<?php echo base_url('images/koran_disabled.png') ?>" class="img img-fluid img-circle">
				<p class="disabled" style="text-align: center;">IKLAN KORAN</p>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col text-center">
			<a href="#" data-toggle="modal" data-target="#sosmedModal">
				<img src="<?php echo base_url('images/digitalprint_disabled.png') ?>" class="img img-fluid img-circle">
				<p class="disabled" style="text-align: center;">DIGITAL PRINT</p>
			</a>
		</div>
		<div class="col text-center">
			
		</div>
	</div>
</div>
