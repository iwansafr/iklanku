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
			<a href="<?= base_url('home/digital_print/form_order/'.$data['id']) ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Konfirmasi Order
			</span>
			<hr>
		</div>
	</div>
	<?php if (!empty($data)): ?>
		<?php if ($data['id'] == 1): ?>
			<form action="<?php echo base_url('home/digital_print/send_order') ?>" method="post">
				<?php
				$biaya = 0;
				if (strtolower($produk['title']) == 'spanduk' || strtolower($produk['title']) == 'backdrop' || strtolower($produk['title']) == 'backlighted' || strtolower($produk['title']) == 'round text') {
					$biaya = $get['width'] * $get['height'] * $get['jumlah'] * $bahan['harga'];
				}else if (strtolower($produk['title']) == 'x-banner' || strtolower($produk['title']) == 'roll banner') {
					$biaya_add = 0;
					if(!empty($get['add'])){
						$biaya_add = $data['harga_add'];
					}else{
						$biaya_add = $data['harga_non_add'];
					}
					$biaya = $get['width'] * $get['height'] * $get['jumlah'] * $bahan['harga'] + $biaya_add;
				}
				?>
				<input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
				<input type="hidden" name="kat_id" value="<?php echo $data['id'] ?>">
				<input type="hidden" name="produk_id" value="<?php echo $get['produk'] ?>">
				<input type="hidden" name="bahan_id" value="<?php echo $bahan['id'] ?>">
				<input type="hidden" name="width" value="<?php echo $get['width'] ?>">
				<input type="hidden" name="height" value="<?php echo $get['height'] ?>">
				<input type="hidden" name="jumlah" value="<?php echo $get['jumlah'] ?>">
				<input type="hidden" name="sisi" value="<?php echo @$get['sisi'] ?>">
				<input type="hidden" name="warna" value="<?php echo @$get['warna'] ?>">
				<input type="hidden" name="flipped" value="<?php echo @$get['flipped'] ?>">
				<input type="hidden" name="potong" value="<?php echo @$get['potong'] ?>">
				<input type="hidden" name="add" value="<?php echo @$get['add'] ?>">
				<input type="hidden" name="biaya" value="<?php echo $biaya ?>">
				<input type="hidden" name="kode" value="<?php echo 'INV0'.substr($data['title'],0,2).$data['id'].$get['produk'].$user['id'].date('Ymdhi') ?>">

				<div class="card card-default" style="border-radius: 0.5rem;">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<span class="font-weight-bold" style="font-size: 3vw;"><?php echo 'INV0'.substr($data['title'],0,2).$data['id'].$get['produk'].$user['id'].date('Ymdhi') ?></span>
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
									<span style="font-size: 3vw;color: grey;">No Handphone</span><br>
									<?php echo $user['phone'] ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Nama Produk</span><br>
									<?php echo $data['title'].' / '.$produk['title'] ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Ukuran / Jumlah</span><br>
									<?php echo $get['width'] ?> / <?php echo $get['height'] ?> CM / <?php echo $get['jumlah'] ?> Unit
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Bahan</span><br>
									<?php echo $bahan['title'] ?>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Finishing</span><br>
									<?php echo $finishing[$get['finishing']]['title'] ?>
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
		<?php endif ?>
		<a href="<?= base_url('home/digital_print/form_order/'.$data['id']) ?>" class="btn btn-sm btn-success btn-lg text-white mt-2" id="submit" style="border-radius: 0.5rem;width: 100%;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
			EDIT FORM
		</a>
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