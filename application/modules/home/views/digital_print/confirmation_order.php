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
			<a href="<?= base_url('home/media/next_order/'.$data['id'].$url_get) ?>" class="float-left">
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
			<form action="<?php echo base_url('home/media/finish_order/'.$data['id'].'/'.$data['title']) ?>" method="post">
				<input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
				<input type="hidden" name="media_id" value="<?php echo $data['id'] ?>">
				<input type="hidden" name="kode" value="<?php echo 'INV0'.$data['title'].date('Ymdhi').$data['id'].$user['id'] ?>">

				<div class="card card-default" style="border-radius: 0.5rem;">
					<div class="card-body">
						<?php pr($data) ?>
						<?php pr($get) ?>
						<div class="row">
							<div class="col">
								<span class="font-weight-bold" style="font-size: 3vw;"><?php echo 'INV0'.$data['title'].date('Ymdhi').$data['id'].$user['id'] ?></span>
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
									<span>Rp. <?php echo number_format(1000000,0,0,'.') ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
					ORDER
				</button>
			</form>
		<?php endif ?>
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