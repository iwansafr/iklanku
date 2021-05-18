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
			<a href="<?= base_url('home/digital_print') ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Form Cetak <?php echo $data['title'] ?>
			</span>
			<hr>
		</div>
	</div>
	<form action="">
		<div class="form-group">
			<select name="produk" id="produk" class="form-control custom" required="">
				<option value="">NAMA PRODUK</option>
				<?php foreach ($produk as $key => $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-3 pr-0">
					<input type="number" class="form-control custom" placeholder="WIDTH">
				</div>
				<div class="col-3 pr-0">
					<input type="number" class="form-control custom" placeholder="HEIGHT">
				</div>
				<div class="col pr-0" style="margin: auto; font-size: 3vw;">
					CM /
				</div>
				<div class="col-3 pl-0 pr-1">
					<input type="number" class="form-control custom" placeholder="JUMLAH">
				</div>
				<div class="col pl-0" style="margin: auto; font-size: 3vw;">
					UNIT
				</div>
			</div>
		</div>
		<div class="form-group">
			<select name="produk" id="produk" class="form-control custom" required="">
				<option value="">BAHAN</option>
				<?php foreach ($bahan as $key => $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<select name="produk" id="produk" class="form-control custom" required="">
				<option value="">FINISHING</option>
				<?php foreach ($finishing as $key => $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-inline mt-3 mb-3">
  		<input autocomplete="off" type="checkbox" style="width: 30px;height: 5vw;" name="include">
  		<div class="text ml-2 font-weight-bold" style="font-size: 3vw; opacity: 0.7">
  			INCLUDE ALAT
  		</div>
		</div>
	</form>
</div>