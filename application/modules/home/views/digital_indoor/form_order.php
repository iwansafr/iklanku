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
<?php $get = $this->input->get(); ?>
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
	<form action="<?php echo base_url('home/digital_indoor/confirmation_order') ?>" method="get">
		<?php if (!empty($get['lokasi'])): ?>
			<?php foreach ($get['lokasi'] as $value): ?>
				<input type="hidden" name="lokasi[]" value="<?php echo $value ?>">
			<?php endforeach ?>
		<?php endif ?>
		<input type="hidden" name="venue_id" value="<?php echo $get['venue'] ?>">
		<div class="form-group text-center">
			<label>Penyewa</label>
			<input type="text" name="nama" class="form-control custom" readonly value="<?php echo $this->session->userdata(base_url().'_logged_in')['username'] ?>">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col">
					<select class="form-control" name="jenis_sewa" required id="sewa">
						<option value="" disabled selected>JENIS SEWA</option>
						<option value="eksklusif">EKSKLUSIF</option>
						<option value="single_slot">SINGLE SLOT</option>
						<option value="multiple_slot">MULTIPLE SLOT</option>
					</select>
				</div>
				<div class="col">
					<select class="form-control" name="slot" required id="slot">
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
			<input type="date" name="mulai_tayang" class="form-control custom" required id="mulai_tayang">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col">
					<input type="number" name="durasi" class="form-control custom" placeholder="DURASI" required min="1" id="durasi">
				</div>
				<div class="col">
					<select class="form-control custom" name="masa_tayang" required id="masa_tayang">
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
<script>
	const sewa = document.querySelector('#sewa');
	sewa.addEventListener('change',function(){
		sewaChange();
	})
	function sewaChange(){
		if(sewa.validity.valueMissing){
			sewa.setCustomValidity('silahkan pilih sewa');
		}else{
			sewa.setCustomValidity('');
		}
	}
	const slot = document.querySelector('#slot');
	slot.addEventListener('change',function(){
		slotChange();
	})
	function slotChange(){
		if(slot.validity.valueMissing){
			slot.setCustomValidity('silahkan pilih slot');
		}else{
			slot.setCustomValidity('');
		}
	}
	const masa_tayang = document.querySelector('#masa_tayang');
	masa_tayang.addEventListener('change',function(){
		masa_tayangChange();
	})
	function masa_tayangChange(){
		if(masa_tayang.validity.valueMissing){
			masa_tayang.setCustomValidity('silahkan pilih masa_tayang');
		}else{
			masa_tayang.setCustomValidity('');
		}
	}
	const mulai_tayang = document.querySelector('#mulai_tayang');
	mulai_tayang.addEventListener('keyup',function(){
		mulai_tayangChange();
	})
	function mulai_tayangChange(){
		if(mulai_tayang.validity.valueMissing){
			mulai_tayang.setCustomValidity('mulai_tayang tidak boleh kosong');
		}else if(mulai_tayang.validity.rangeUnderflow){
			mulai_tayang.setCustomValidity('mulai_tayang minimal 1');
		}else{
			mulai_tayang.setCustomValidity('');
		}
	}
	const durasi = document.querySelector('#durasi');
	durasi.addEventListener('keyup',function(){
		durasiChange();
	})
	function durasiChange(){
		if(durasi.validity.valueMissing){
			durasi.setCustomValidity('durasi tidak boleh kosong');
		}else if(durasi.validity.rangeUnderflow){
			durasi.setCustomValidity('durasi minimal 1');
		}else{
			durasi.setCustomValidity('');
		}
	}
	const submit = document.querySelector('#submit');
	submit.addEventListener('click',function(){
		sewaChange();
		slotChange();
		masa_tayangChange();
		mulai_tayangChange();
		durasiChange();
	})
</script>