<?php $param = json_decode($data['param'],1) ?>
<div class="panel panel-default" style="border-radius: 0.5rem;">
	<a href="<?= base_url('admin/pesanan_sosmed') ?>" class="btn btn-info btn-sm">
		<i class="fa fa-arrow-left"></i>
		Kembali
	</a>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12">
				<img src="<?= image_module('media',$data['media_id'].'/'.$data['gambar_media']) ?>" class="img img-responsive" alt="">
			</div>
			<div class="col-xs-12">
				<span class="font-weight-bold" style="font-size: 4vw;"><?php echo $data['kode'] ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Nama Paket</span><br>
					<span style="font-size: 3vw;">
						<?php echo $data['nama_media'].' / '.$this->media_model->bulan()[$data['durasi']] ?>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Nama Usaha / Produk</span><br>
					<span style="font-size: 3vw;">
						<?php echo $data['nama'] ?>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Alamat</span><br>
					<span style="font-size: 3vw;">
						<?php echo $data['alamat'] ?>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">No. HP</span><br>
					<span style="font-size: 3vw;">
						<?php echo $data['hp'] ?>
					</span>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Instagram</span><br>
					<span style="font-size: 3vw;">
						<?php echo $data['ig'] ?>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
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
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Biaya</span><br>
					<span>Rp. <?php echo number_format($data['total'],0,0,'.') ?></span>
				</div>
			</div>
		</div>
	</div>
</div>