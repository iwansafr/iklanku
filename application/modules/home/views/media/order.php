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
</style>
<div class="container mt-5 pt-5 " id="pageSewa">
	<?php $get = $this->input->get(); ?>
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url('home/radio') ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Form Pasang Iklan <?php echo $this->media_model->media_type()[$data['tipe']] ?>
			</span>
			<hr>
			<span class="font-weight-bold"><?= $data['nama'] ?></span>
		</div>
	</div>
	<?php if (!empty($data)): ?>
		<?php if ($data['tipe'] == 1): ?>
			<form action="<?php echo base_url('home/media/next_order/'.$data['id']) ?>" method="get">
				<div class="form-group">
					<select name="tipe" id="tipe" class="form-control custom" required>
						<option value="">PILIH TIPE IKLAN</option>
						<?php foreach ($this->media_model->tipe_radio() as $key => $value): ?>
							<option value="<?= $key ?>" <?= !empty($get['tipe']) && @$get['tipe']==$key ? 'selected' : ''; ?>><?= $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<select name="time" id="time" class="form-control custom" required>
						<option value="">WAKTU TAYANG</option>
						<?php foreach ($this->media_model->time_radio() as $key => $value): ?>
							<option value="<?php echo $key ?>" <?= !empty($get['time']) && @$get['time']==$key ? 'selected' : ''; ?> ><?php echo $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col">
							<input type="number" name="durasi" id="durasi" min="1" class="form-control custom" placeholder="DURASI" required <?= !empty($get['durasi']) ? 'value="'.$get['durasi'].'"' : ''; ?> >
						</div>
						<div class="col">
							<select name="masa" id="masa" class="form-control custom" required>
								<option value="">MASA</option>
								<?php foreach ($this->media_model->masa_radio() as $key => $value): ?>
									<option value="<?php echo $key ?>" <?= !empty($get['masa']) && @$get['masa']==$key ? 'selected' : ''; ?> ><?php echo $value ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
					LANJUT
				</button>
			</form>
			<script>
				const tipe  = document.querySelector('#tipe');
				const time  = document.querySelector('#time');
				const durasi  = document.querySelector('#durasi');
				const masa  = document.querySelector('#masa');
				const submit = document.querySelector('#submit');

				submit.addEventListener('click',()=>{
				    tipechange();
				    timechange();
				    durasichange();
				    masachange();
				});
				tipe.addEventListener('change',()=>{
					tipechange();
				});
				time.addEventListener('change',()=>{
					timechange();
				})
				durasi.addEventListener('keyup',()=>{
					durasichange();
				})
				masa.addEventListener('change',()=>{
					masachange();
				})
				function tipechange(){
					if(tipe.validity.valueMissing){
			        tipe.setCustomValidity('SILAHKAN PILIH TIPE IKLAN');
			    }else{
			        tipe.setCustomValidity('');
			    }
				}
				function timechange(){
					if(time.validity.valueMissing){
			        time.setCustomValidity('SILAHKAN PILIH WAKTU TAYANG');
			    }else{
			        time.setCustomValidity('');
			    }
				}
				function masachange(){
					if(masa.validity.valueMissing){
			        masa.setCustomValidity('SILAHKAN PILIH MASA');
			    }else{
			        masa.setCustomValidity('');
			    }
				}
				function durasichange(){
					if(durasi.validity.valueMissing){
			        durasi.setCustomValidity('DURASI TIDAK BOLEH KOSONG');
			    }else if(durasi.validity.rangeUnderflow){
			        durasi.setCustomValidity('DURASI MINIMAL 1');
			    }else{
			        durasi.setCustomValidity('');
			    }
				}
			</script>		
		<?php elseif($data['tipe'] == 2): ?>
			
		<?php endif ?>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>