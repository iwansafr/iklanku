<div class="panel panel-default" style="border-radius: 0.5rem;">
	<a href="<?= base_url('admin/pesanan_indoor') ?>" class="btn btn-info btn-sm">
		<i class="fa fa-arrow-left"></i>
		Kembali
	</a>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<span class="font-weight-bold" style="font-size: 3vw;"><?php echo $data['kode'] ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Nama Pelanggan</span><br>
					<?php echo $param['nama user'] ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Jenis Sewa</span><br>
					<?php echo $data['jenis_sewa'] ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Lokasi</span><br>
					<?php echo $venue['title'].' / ' ?>
					<?php echo $param['nama lokasi'] ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Mulai Tayang</span><br>
					<?php echo str_replace('-',' ',content_date($data['mulai_tayang'])) ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Masa Tayang</span><br>
					<?php echo $data['durasi'],' '.$data['masa_tayang'] ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Biaya</span><br>
					<span>Rp. <?php echo number_format($data['biaya'],0,0,'.') ?></span>
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
$form->setTable('digital_indoor_order');
$form->setId($data['id']);
$form->addInput('status_pembayaran','dropdown');
$form->setLabel('status_pembayaran','Status Pembayaran');
$form->setOptions('status_pembayaran',['Belum Transfer','Sudah Transfer']);
$form->addInput('status_order','dropdown');
$form->setLabel('status_order','Status Order');
$form->setOptions('status_order',['Belum Tayang','Sudah Tayang']);
$form->form();
?>