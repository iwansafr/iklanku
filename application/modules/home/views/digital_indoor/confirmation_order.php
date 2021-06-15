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
			<a href="<?= base_url('home/digital_indoor') ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Form Sewa Slot
			</span>
			<hr>
		</div>
	</div>
	<form action="" method="get">
		<div class="form-group text-center">
			<label>Penyewa</label>
			<input type="text" name="nama" class="form-control custom" readonly value="<?php echo $this->session->userdata(base_url().'_logged_in')['username'] ?>">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col">
					<select class="form-control" name="sewa" required>
						<option value="" disabled selected>JENIS SEWA</option>
						<option value="eksklusif">EKSKLUSIF</option>
						<option value="single slot">SINGLE SLOT</option>
						<option value="multiple slot">MULTIPLE SLOT</option>
					</select>
				</div>
				<div class="col">
					<select class="form-control" name="slot" required>
						<option value="" disabled selected>JUMLAH SLOT</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group text-center">
			<label>Mulai Tayang</label>
			<input type="date" name="mulai_tayang" class="form-control custom" required>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col">
					<input type="number" name="durasi" class="form-control custom" placeholder="DURASI" required min="1">
				</div>
				<div class="col">
					<select class="form-control custom" name="masa_tayang" required>
						<option value="" disabled selected>MASA TAYANG</option>
						<option>HARI</option>
						<option>MINGGU</option>
						<option>BULAN</option>
					</select>
				</div>
			</div>
		</div>

		<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
			LANJUT
		</button>
	</form>
</div>