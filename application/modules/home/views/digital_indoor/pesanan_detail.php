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
			<a href="<?= base_url('home/digital_indoor/pesanan') ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Pesanan Detail
			</span>
			<hr>
		</div>
	</div>
	<div class="card card-default" style="border-radius: 0.5rem;">
		<a href="<?= base_url('home/digital_indoor/pesanan') ?>" class="btn btn-info btn-sm">
			<i class="fa fa-arrow-left"></i>
			Kembali
		</a>
		<div class="card-body">
			<div class="row">
				<div class="col">
					<span class="font-weight-bold" style="font-size: 3vw;"><?php echo $data['kode'] ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Nama Pelanggan</span><br>
						<?php echo $param['nama user'] ?>
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
				$status = ['Belum Transfer','Sudah Transfer'];
				$order = ['Belum Tayang','Sudah Tayang'];
				?>
				<div class="col-6">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Status Pembayaran</span><br>
						<a href="<?php echo base_url('home/digital_indoor/payment/'.$data['id']) ?>" class="btn btn-sm btn-warning">
							<?php echo $status[$data['status_pembayaran']] ?>
						</a>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Status Order</span><br>
						<a href="<?php echo base_url('home/digital_indoor/payment/'.$data['id']) ?>" class="btn btn-sm btn-warning">
							<?php echo $status[$data['status_order']] ?>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Jenis Sewa</span><br>
						<?php echo $data['jenis_sewa'] ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Lokasi</span><br>
						<?php echo $data['venue'].' / ' ?>
						<?php echo $param['nama lokasi'] ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Mulai Tayang</span><br>
						<?php echo str_replace('-',' ',content_date($data['mulai_tayang'])) ?>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Masa Tayang</span><br>
						<?php echo $data['durasi'],' '.$data['masa_tayang'] ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Biaya</span><br>
						<span>Rp. <?php echo number_format($data['biaya'],0,0,'.') ?></span>
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
</div>