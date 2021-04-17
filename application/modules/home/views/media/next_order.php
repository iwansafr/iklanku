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
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url() ?>" class="float-left">
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
			<form action="<?php echo base_url('home/media/next_order/'.$data['id']) ?>" method="get">
				<div class="form-group">
					<select name="kategori" id="kategori" class="form-control custom" required>
						<option value="">PILIH KATEGORI</option>
						<option value="1">PRODUK</option>
						<option value="2">USAHA</option>
						<option value="3">EVENT</option>
						<option value="4">KEHILANGAN</option>
						<option value="5">LAIN-LAIN</option>
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
			<div class="form-group">
		   	<div class="row">
		   		<div class="col">
		   			<div class="form-group">
		   				<label for="tipe">Tipe Iklan</label>
		   				<select name="tipe" class="form-control" id="tipeIklan">
		   					<option value="1">Text</option>
		   					<option value="2">Graphic</option>
		   				</select>
		   			</div>
		   		</div>
		   	</div>
		   	<div class="row" id="bariskolom">
		   		<div class="col">
		   			<div class="form-group">
		   				<label for="tipe">Baris X Kolom</label>
		   				<select class="form-control" id="baris_kolom">
		   					<option value="1">1x1</option>
		   					<option value="2">1x2</option>
		   					<option value="3">2x2</option>
		   				</select>
		   				<div id="bariskolomvalue">
		   					<input type="hidden" name="baris" value="1">
								<input type="hidden" name="kolom" value="1">
		   				</div>
		   			</div>
		   		</div>
		   	</div>
		   	<div class="row">
		   		<div class="col">
		   			<div class="form-group">
		   				<label for="biaya">biaya</label>
		   				<input type="text" readonly class="form-control" id="biaya" value="Rp <?php echo number_format($data['tarif'],0,',','.');?>">
		   				<input type="hidden" name="biaya" id="biayavalue" value="<?php echo $data['tarif'];?>">
		   			</div>
		   		</div>
		   	</div>
		   	<div class="row">
		   		<div class="col">
		   			<label for="isi">Isi Iklan</label>
		   			<textarea name="isi" id="isiIklan" cols="30" rows="5" class="form-control" required oninvalid="this.setCustomValidity('Isi iklan tidak boleh kosong')" oninput="this.setCustomValidity('')"></textarea>
		   		</div>
		   	</div>
		   	<hr>
		  </div>
			<button class="btn btn-sm btn-primary btn-lg" style="border-radius: 1.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
				SELESAI
			</button>
		<?php endif ?>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>