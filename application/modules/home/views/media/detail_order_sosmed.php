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
	<?php $user = $this->session->userdata(base_url().'_logged_in') ?>
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url('home/media/pesanan_sosmed') ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Detail Order
			</span>
			<hr>
		</div>
	</div>
	<?php if (!empty($data)): ?>
		<?php $param = json_decode($data['param'],1) ?>
		<div class="card card-default" style="border-radius: 0.5rem;">
			<div class="card-body">
				<div class="row">
					<div class="col">
						<span class="font-weight-bold" style="font-size: 3vw;"><?php echo $data['kode'] ?></span>
					</div>
					<div class="col-3">
						<img src="<?= image_module('media',$data['media_id'].'/'.$data['gambar_media']) ?>" class="img img-fluid" alt="">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<span style="font-size: 3vw;color: grey;">Nama Paket</span><br>
							<span style="font-size: 3vw;">
								<?php echo $data['nama_media'].' / '.$this->media_model->bulan()[$data['durasi']] ?>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<span style="font-size: 3vw;color: grey;">Nama Usaha / Produk</span><br>
							<span style="font-size: 3vw;">
								<?php echo $data['nama'] ?>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<span style="font-size: 3vw;color: grey;">Alamat</span><br>
							<span style="font-size: 3vw;">
								<?php echo $data['alamat'] ?>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<span style="font-size: 3vw;color: grey;">No. HP</span><br>
							<span style="font-size: 3vw;">
								<?php echo $data['hp'] ?>
							</span>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<span style="font-size: 3vw;color: grey;">Instagram</span><br>
							<span style="font-size: 3vw;">
								<?php echo $data['ig'] ?>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<?php 
							$total_post = $param['x_post'];
							$time = 4*$data['durasi'];
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
							<span>Rp. <?php echo number_format($data['total'],0,0,'.') ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>