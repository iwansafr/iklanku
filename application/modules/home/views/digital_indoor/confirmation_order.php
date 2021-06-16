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
	<?php if (!empty($_POST)): ?>
		<?php $get = $this->input->post(); ?>
	<?php else: ?>
		<?php $get = $this->input->get(); ?>
	<?php endif ?>
	<?php $user = $this->session->userdata(base_url().'_logged_in') ?>
	<div class="title text-center">
		<div class="container">
			<form action="<?= base_url('home/digital_indoor/form_order/') ?>" method="get">
				<?php foreach ($get as $key => $value): ?>
					<?php if ($key=='lokasi'): ?>
						<?php foreach ($value as $lkey => $lvalue): ?>
							<input type="hidden" name="lokasi[]" value="<?= $lvalue ?>">
						<?php endforeach ?>
					<?php else: ?>
						<input type="hidden" name="<?php echo $key ?>" value="<?= $value ?>">
					<?php endif ?>
				<?php endforeach ?>
				<button type="submit" class="float-left btn-sm btn-primary">
					<i class="fa fa-arrow-left"></i>
				</button>
			</form>
			<span class="font-weight-bold">
				Konfirmasi Order
			</span>
			<hr>
		</div>
	</div>
	<?php if (!empty($config)): ?>
		<form action="<?php echo base_url('home/digital_indoor/send_order') ?>" method="post">
			<?php
			$biaya = 0;
			$durasi = 0;
			if ($get['masa_tayang'] == 'HARI') {
				$durasi = 1;
			}else if($get['masa_tayang'] == 'MINGGU'){
				$durasi = 7;
			}else if($get['masa_tayang'] == 'BULAN'){
				$durasi = 30;
			}
			$biaya = $config[$get['jenis_sewa']]*$get['slot']*$durasi;
			$ppn = $biaya*10/100;
			$biaya = $biaya+$ppn;
			?>
			<input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
			<input type="hidden" name="kode" value="<?php echo 'INV0'.$user['id'].date('Ymdhi') ?>">
			<input type="hidden" name="biaya" value="<?php echo $biaya ?>">
			<input type="hidden" name="username" value="<?php echo $user['username'] ?>">
			<input type="hidden" name="hp" value="<?php echo $user['phone'] ?>">

			<?php foreach ($get as $key => $value): ?>
				<?php if ($key=='lokasi'): ?>
					<?php foreach ($value as $lkey => $lvalue): ?>
						<input type="hidden" name="lokasi[]" value="<?php echo $lvalue ?>">
					<?php endforeach ?>
				<?php else: ?>
					<input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
				<?php endif ?>
			<?php endforeach ?>

			<div class="card card-default" style="border-radius: 0.5rem;">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<span class="font-weight-bold" style="font-size: 3vw;"><?php echo 'INV0'.$user['id'].date('Ymdhi') ?></span>
						</div>
						<div class="col-3">
							<img src="<?= image_module('digital_print') ?>" class="img img-fluid" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<span style="font-size: 3vw;color: grey;">Nama Pelanggan</span><br>
								<?php echo $user['username'] ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<span style="font-size: 3vw;color: grey;">Jenis Sewa</span><br>
								<?php echo $get['jenis_sewa'] ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<span style="font-size: 3vw;color: grey;">Venue</span><br>
								<?php echo $venue['title'].' / ' ?>
								<?php foreach ($venue_location as $vlk => $vlv): ?>
									<?php echo $vlv['location'] ?>,
								<?php endforeach ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<span style="font-size: 3vw;color: grey;">Mulai Tayang</span><br>
								<?php echo str_replace('-',' ',content_date($get['mulai_tayang'])) ?>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<span style="font-size: 3vw;color: grey;">Masa Tayang</span><br>
								<?php echo $get['durasi'],' '.$get['masa_tayang'] ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<span style="font-size: 3vw;color: grey;">Biaya</span><br>
								<span>Rp. <?php echo number_format($biaya,0,0,'.') ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<?php if (!empty($biaya)): ?>
				<div id="submitdiv">
					<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
						LANJUT
					</button>
				</div>
				<div id="loadingdiv" class="text-center d-none">
					<span>Memproses Pesanan ...</span>
				</div>
			<?php else: ?>
				Biaya Tidak Valid
			<?php endif ?>
		</form>
		<form action="<?= base_url('home/digital_print/form_order/') ?>" method="get">
			<?php foreach ($get as $key => $value): ?>
				<?php if ($key=='lokasi'): ?>
					<?php foreach ($value as $lkey => $lvalue): ?>
						<input type="hidden" name="lokasi[]" value="<?= $lvalue ?>">
					<?php endforeach ?>
				<?php else: ?>
					<input type="hidden" name="<?php echo $key ?>" value="<?= $value ?>">
				<?php endif ?>
			<?php endforeach ?>

			<button type="submit" class="btn btn-sm btn-success btn-lg text-white mt-2" id="submit" style="border-radius: 0.5rem;width: 100%;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
				EDIT FORM
			</button>
		</form>
		<script>
			const submit = document.querySelector('#submit');
			const loadingdiv = document.querySelector('#loadingdiv');
			const submitdiv = document.querySelector('#submitdiv');
			submit.addEventListener('click',()=>{
			   loadingdiv.classList.remove('d-none');
			   submitdiv.classList.add('d-none');
			});
		</script>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>