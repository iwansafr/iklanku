<div class="panel panel-default" style="border-radius: 0.5rem;">
	<a href="<?= base_url('admin/pesanan_digital') ?>" class="btn btn-info btn-sm">
		<i class="fa fa-arrow-left"></i>
		Kembali
	</a>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-9">
				<span class="font-weight-bold" style="font-size: 3vw;"><?php echo $data['kode'] ?></span>
			</div>
			<div class="col-md-3">
				<img src="<?= image_module('digital_print') ?>" class="img img-responsive" alt="">
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
<?php 
$form = new Zea();
$form->init('edit');
$form->setEditStatus(false);
$form->setHeading('Ubah Status');
$form->setTable('digital_print_order');
$form->setId($data['id']);
$form->addInput('status_pembayaran','dropdown');
$form->setLabel('status_pembayaran','Status Pembayaran');
$form->setOptions('status_pembayaran',['Belum Transfer','Sudah Transfer']);
$form->addInput('status_order','dropdown');
$form->setLabel('status_order','Status Order');
$form->setOptions('status_order',['Belum Tayang','Sudah Tayang']);
$form->form();
?>