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
			<a href="<?= base_url('home/media/order/'.$data['id'].'?tipe='.$get['tipe'].'&time='.$get['time'].'&durasi='.$get['durasi'].'&masa='.$get['masa']) ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Form Pasang Iklan Radio
			</span>
			<hr>
			<span class="font-weight-bold"><?= $data['nama'] ?></span>
		</div>
	</div>
	<?php if (!empty($data)): ?>
		<?php if ($data['tipe'] == 1): ?>
			<form action="<?php echo base_url('home/media/confirmation_order/'.$data['id']) ?>" method="get">
				<div class="form-group">
					<input type="hidden" name="tipe" value="<?php echo $get['tipe'] ?>">
					<input type="hidden" name="time" value="<?php echo $get['time'] ?>">
					<input type="hidden" name="durasi" value="<?php echo $get['durasi'] ?>">
					<input type="hidden" name="masa" value="<?php echo $get['masa'] ?>">
					<select name="kategori" id="kategori" class="form-control custom" required>
						<option value="">PILIH KATEGORI</option>
						<?php foreach ($this->media_model->kategori_radio() as $key => $value): ?>
							<option value="<?php echo $key ?>"><?php echo $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<textarea name="iklan" id="iklan" class="form-control custom" style="height: 30vw!important;" placeholder="KETIK KALIMAT IKLAN ANDA DI SINI" required></textarea>
				</div>
				<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
					LANJUT
				</button>
			</form>
			<script>
				const kategori  = document.querySelector('#kategori');
				const iklan  = document.querySelector('#iklan');
				const submit = document.querySelector('#submit');

				submit.addEventListener('click',()=>{
				    kategoriChange();
				    iklanChange();
				});
				kategori.addEventListener('change',()=>{
					kategoriChange();
				});
				iklan.addEventListener('keyup',()=>{
					iklanChange();
				})
				function kategoriChange(){
					if(kategori.validity.valueMissing){
			        kategori.setCustomValidity('SILAHKAN PILIH KATEGORI IKLAN');
			    }else{
			        kategori.setCustomValidity('');
			    }
				}
				function iklanChange(){
					if(iklan.validity.valueMissing){
			        iklan.setCustomValidity('IKLAN TIDAK BOLEH KOSONG');
			    }else{
			        iklan.setCustomValidity('');
			    }
				}
			</script>		
		<?php elseif($data['tipe'] == 2): ?>
			
		<?php endif ?>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>