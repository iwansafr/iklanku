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
	<form action="<?php echo base_url('home/digital_print/confirmation_order/') ?>" method="get">
		<div class="form-group">
			<select name="venue" id="venue" class="form-control custom" required="">
				<option value="">VENUE</option>
				<?php foreach ($venue as $key => $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



		<select class="selectpicker" multiple data-live-search="true">
		  <option>Mustard</option>
		  <option>Ketchup</option>
		  <option>Relish</option>
		</select>
		<!-- <div class="form-group">
			<select multiple="multiple" name="lokasi" id="lokasi" class="form-control custom" required="" size="5">
				<option value="">LOKASI</option>
			</select>
		</div> -->
	</form>
</div>
<script>
	$('select').selectpicker();
</script>