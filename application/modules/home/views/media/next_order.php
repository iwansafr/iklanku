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
	<?php 
	$url_get = '';
	$i = 0;
	foreach ($get as $key => $value)
	{
		if($i > 0)
		{
			$url_get .= '&';
		}
		$url_get .= $key.'='.$value;
		$i++;
	}
	$url_get = !empty($url_get) ? '?'.$url_get : '';
	?>
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url('home/media/next_order/'.$data['id'].$url_get) ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Form Order Iklan <?php echo $this->media_model->media_type()[$data['tipe']] ?>
			</span>
			<hr>
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
		
		<?php elseif ($data['tipe'] == 3): ?>
			 <button class="btn btn-secondary mb-3" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;"><?php echo $data['nama'] ?></button>
			 <form action="<?php echo base_url('home/media/confirmation_order/'.$data['id']) ?>" method="get">
				<div class="form-group">
					<select name="durasi" id="durasi" class="form-control custom" required>
						<option value="">DURASI</option>
						<?php foreach ($this->media_model->bulan() as $key => $value): ?>
							<option value="<?php echo $key ?>"><?php echo $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<input type="text" placeholder="NAMA USAHA / PRODUK ANDA" class="form-control custom" id="nama" name="nama" required>
				</div>
				<div class="form-group">
					<input type="number" placeholder="NOMOR HANDPHONE" class="form-control custom" id="hp" name="hp" required>
				</div>
				<div class="form-group">
					<input type="text" placeholder="NAMA AKUN INSTAGRAM" class="form-control custom" id="ig" name="ig" required>
				</div>
				<div class="form-group">
					<textarea name="alamat" id="alamat" class="form-control custom" style="height: 30vw!important;" placeholder="ALAMAT LENGKAP" required></textarea>
				</div>
				<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
					LANJUT
				</button>
			</form>
			<div class="clearfix mb-1"></div>
			<a href="<?php echo base_url('home/sosmed') ?>" class="btn btn-sm btn-success btn-lg text-white" style="border-radius: 0.5rem;width: 100%;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
				UBAH PAKET
			</a>
			<script>
				const durasi  = document.querySelector('#durasi');
				const hp  = document.querySelector('#hp');
				const nama  = document.querySelector('#nama');
				const ig  = document.querySelector('#ig');
				const alamat  = document.querySelector('#alamat');
				const submit = document.querySelector('#submit');

				submit.addEventListener('click',()=>{
				    durasiChange();
				    hpChange();
				    igChange();
				    namaChange();
				    alamatChange();
				});
				durasi.addEventListener('change',()=>{
					durasiChange();
				});
				hp.addEventListener('keyup',()=>{
					hpChange();
				})
				ig.addEventListener('keyup',()=>{
					igChange();
				})
				nama.addEventListener('keyup',()=>{
					namaChange();
				})
				alamat.addEventListener('keyup',()=>{
					alamatChange();
				})
				function durasiChange(){
					if(durasi.validity.valueMissing){
			        durasi.setCustomValidity('SILAHKAN PILIH DUARSI IKLAN');
			    }else{
			        durasi.setCustomValidity('');
			    }
				}
				function hpChange(){
					if(hp.validity.valueMissing){
			        hp.setCustomValidity('NOMOR HANDPHONE TIDAK BOLEH KOSONG');
			    }else{
			        hp.setCustomValidity('');
			    }
				}
				function igChange(){
					if(ig.validity.valueMissing){
			        ig.setCustomValidity('NOMOR HANDPHONE TIDAK BOLEH KOSONG');
			    }else{
			        ig.setCustomValidity('');
			    }
				}
				function namaChange(){
					if(nama.validity.valueMissing){
			        nama.setCustomValidity('NAMA USAHA / PRODUK TIDAK BOLEH KOSONG');
			    }else{
			        nama.setCustomValidity('');
			    }
				}
				function alamatChange(){
					if(alamat.validity.valueMissing){
			        alamat.setCustomValidity('ALAMAT TIDAK BOLEH KOSONG');
			    }else{
			        alamat.setCustomValidity('');
			    }
				}
			</script>		
		<?php endif ?>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>