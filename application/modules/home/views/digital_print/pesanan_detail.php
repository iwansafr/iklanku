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
			<a href="<?= base_url('home/digital_print/pesanan') ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Pesanan Detail
			</span>
			<hr>
		</div>
	</div>
	<div class="card card-default" style="border-radius: 0.5rem;">
		<div class="card-body">
			<div class="row">
				<div class="col-md-9">
					<span class="font-weight-bold" style="font-size: 3vw;"><?php echo $data['kode'] ?></span>
				</div>
				<div class="col-md-3">
					<img src="<?= image_module('digital_print') ?>" class="img img-fluid" alt="">
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
						<?php echo $status[$data['status_pembayaran']] ?>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Status Order</span><br>
						<?php echo $status[$data['status_order']] ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Nama Pelanggan</span><br>
						<?php echo $param['Nama User'] ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">No Handphone</span><br>
						<?php echo $param['No HP'] ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Nama Produk</span><br>
						<?php echo $param['Nama Menu'].' / '.$param['Nama Produk'] ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Ukuran / Jumlah</span><br>
						<?php echo $param['Ukuran'],' / '.$param['Jumlah']?> Unit
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Bahan</span><br>
						<?php echo $param['Bahan'] ?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Finishing</span><br>
						<?php echo $param['Bahan'] ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<span style="font-size: 3vw;color: grey;">Biaya</span><br>
						<span>Rp. <?php echo number_format($param['Biaya'],0,0,'.') ?></span>
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
</div>