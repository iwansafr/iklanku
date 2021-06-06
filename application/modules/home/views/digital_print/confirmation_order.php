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
									<?php echo $get['produk'] ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Ukuran / Jumlah</span><br>
									<?php echo $get['width'] ?> / <?php echo $get['height'] ?> / <?php echo $get['jumlah'] ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Bahan</span><br>
									<?php echo $get['bahan'] ?>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Finishing</span><br>
									<?php echo $get['finishing'] ?>
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
		<?php elseif($data['tipe'] == 2): ?>
			<form action="<?php echo base_url('home/media/finish_order/'.$data['id'].'/'.$data['tipe']) ?>" method="post">
				<input type="hidden" name="tipe" value="<?php echo $get['tipe'] ?>">
				<input type="hidden" name="kolom" value="<?php echo $get['kolom'] ?>">
				<input type="hidden" name="durasi" value="<?php echo $get['durasi'] ?>">
				<input type="hidden" name="masa" value="<?php echo $get['masa'] ?>">
				<input type="hidden" name="colour" value="<?php echo $get['colour'] ?>">
				<?php if (!empty($get['iklan'])): ?>
					<input type="hidden" name="iklan" value="<?php echo $get['iklan'] ?>">
				<?php endif ?>
				<?php if (!empty($thumbnail)): ?>
					<input type="hidden" name="image" value="<?php echo $thumbnail ?>">
				<?php endif ?>
				<input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
				<input type="hidden" name="media_id" value="<?php echo $data['id'] ?>">
				<input type="hidden" name="kode" value="<?php echo 'INV0'.$data['tipe'].date('Ymdhi').$data['id'].$user['id'] ?>">

				<div class="card card-default" style="border-radius: 0.5rem;">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<span class="font-weight-bold" style="font-size: 3vw;"><?php echo 'INV0'.$data['tipe'].date('Ymdhi').$data['id'].$user['id'] ?></span>
							</div>
							<div class="col-3">
								<img src="<?= image_module('media',$data['id'].'/'.$data['photo']) ?>" class="img img-fluid" alt="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Tipe Iklan</span><br>
									<span style="font-size: 3vw;">
										<?php echo $this->media_model->tipe_koran()[$get['tipe']].' / '.$this->media_model->colour()[$get['colour']] ?>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Masa Tayang</span><br>
									<span style="font-size: 3vw;">
										<?php echo $get['durasi'].' '.$this->media_model->masa_radio()[$get['masa']] ?>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Isi Iklan</span><br>
									<p style="font-size: 3vw;">
										<?php if (!empty($thumbnail)): ?>
											<img src="<?php echo $thumbnail ?>" alt="" class="img img-fluid">
										<?php endif ?>
									</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Biaya</span><br>
									<?php 
									if($get['masa'] == 1){
										$masa = 1;
									}else if($get['masa'] == 2){
										$masa = 7;
									}else{
										$masa = 30;
									};
									$waktu = $masa*$get['durasi'];
									?>
									<span>Rp. <?php echo number_format($data['tarif']*$waktu,0,0,'.') ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div id="submitdiv">
					<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
						ORDER
					</button>
				</div>
				<div id="loadingdiv" class="text-center d-none">
					<span>Memproses Pesanan ...</span>
				</div>
			</form>
		<?php elseif ($data['tipe'] == 3): ?>
			<form action="<?php echo base_url('home/media/finish_order/'.$data['id'].'/'.$data['tipe']) ?>" method="post">
				<?php foreach ($get as $key => $value): ?>
					<input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
				<?php endforeach ?>
				<?php if (!empty($get['iklan'])): ?>
					<input type="hidden" name="iklan" value="<?php echo $get['iklan'] ?>">
				<?php endif ?>
				<?php if (!empty($thumbnail)): ?>
					<input type="hidden" name="image" value="<?php echo $thumbnail ?>">
				<?php endif ?>
				<input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
				<input type="hidden" name="media_id" value="<?php echo $data['id'] ?>">
				<input type="hidden" name="kode" value="<?php echo 'INV0'.$data['tipe'].date('Ymdhi').$data['id'].$user['id'] ?>">
				<?php $param = json_decode($data['param'],1) ?>
				<div class="card card-default" style="border-radius: 0.5rem;">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<span class="font-weight-bold" style="font-size: 3vw;"><?php echo 'INV0'.$data['tipe'].date('Ymdhi').$data['id'].$user['id'] ?></span>
							</div>
							<div class="col-3">
								<img src="<?= image_module('media',$data['id'].'/'.$data['photo']) ?>" class="img img-fluid" alt="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Nama Paket</span><br>
									<span style="font-size: 3vw;">
										<?php echo $data['nama'].' / '.$this->media_model->bulan()[$get['durasi']] ?>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Nama Usaha / Produk</span><br>
									<span style="font-size: 3vw;">
										<?php echo $get['nama'] ?>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Alamat</span><br>
									<span style="font-size: 3vw;">
										<?php echo $get['alamat'] ?>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">No. HP</span><br>
									<span style="font-size: 3vw;">
										<?php echo $get['hp'] ?>
									</span>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Instagram</span><br>
									<span style="font-size: 3vw;">
										<?php echo $get['ig'] ?>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<?php 
									$total_post = $param['x_post'];
									$time = 4*$get['durasi'];
									$total_post = $total_post*$time;
									?>
									<span style="font-size: 3vw;">
										Total Desain & Post Feed : <?php echo $total_post ?>
										<br>
										Report & Support by Email & WA
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Biaya</span><br>
									<?php 
									$masa = 30;
									$waktu = $masa*$get['durasi'];
									$tarif = $data['tarif'];
									if(!empty($param['harga_'.$get['durasi'].'_Bulan']))
									{
										$tarif = $param['harga_'.$get['durasi'].'_Bulan'];
									}else{
										$tarif = $tarif*$waktu;
									}
									?>
									<span>Rp. <?php echo number_format($tarif,0,0,'.') ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div id="submitdiv">
					<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
						ORDER
					</button>
				</div>
				<div id="loadingdiv" class="text-center d-none">
					<span>Memproses Pesanan ...</span>
				</div>
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