<style>
	.input{
    border-radius: 0.5rem!important;
    background-color: #bcbcbc!important;
    font-size: 3vw;
	}
	.form-control{
		font-size: 3vw!important;
	}
	.select{
    border-radius: 0.5rem!important;
	}
	.custom{
		height: 10vw!important;
    border-radius: 0.5rem!important;
    background-color: white!important;
    text-align: center;
    font-size: 4vw;
	}
	select {
	   text-align-last: center;
	   text-align: center;
	   -ms-text-align-last: center;
	   -moz-text-align-last: center;
	}
	.fileContainer [type=file] {
      cursor: inherit;
      display: block;
      font-size: 999px;
      filter: alpha(opacity=0);
      min-width: 100%;
      opacity: 0;
      position: absolute;
      right: 0;
      text-align: right;
      top: 50%;
  }
  .v3{
   	font-size: 3vw;
  }
</style>
<div class="container mt-5 pt-5 " id="pageSewa">
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url() ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Digital Indoor Media
			</span>
			<hr>
		</div>
	</div>
	<form action="<?php echo base_url('home/digital_indoor/form_order/') ?>" method="get">
		<div class="form-group">
			<select name="venue" id="venue" class="form-control custom" required="" required>
				<option value="" disabled selected>Pilih VENUE</option>
				<?php foreach ($venue as $key => $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
	    <select class="mdb-select colorful-select dropdown-primary md-form form-control" multiple searchable="Search here.." name="lokasi[]" id="lokasi" required>
	      <option value="" disabled selected>Pilih Lokasi</option>
	    </select>
		</div>
		<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
			LANJUT
		</button>
	</form>
</div>