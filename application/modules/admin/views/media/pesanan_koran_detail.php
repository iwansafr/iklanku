<div class="panel panel-default" style="border-radius: 0.5rem;">
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-9">
				<span class="font-weight-bold" style="font-size: 3vw;"><?php echo 'INV0'.$data['tipe'].date('Ymdhi').$data['id'].$user['id'] ?></span>
			</div>
			<div class="col-xs-3">
				<img src="<?= image_module('media',$data['id'].'/'.$data['photo']) ?>" class="img img-responsive" alt="">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Tipe Iklan</span><br>
					<span style="font-size: 3vw;">
						<?php echo $this->media_model->tipe_koran()[$data['tipe']].' / '.$this->media_model->colour()[$data['colour']] ?>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Masa Tayang</span><br>
					<span style="font-size: 3vw;">
						<?php echo $data['durasi'].' '.$this->media_model->masa_radio()[$data['masa']] ?>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Isi Iklan</span><br>
					<p style="font-size: 3vw;">
						<?php if (!empty($data['image'])): ?>
							<img src="<?php echo $data['image'] ?>" alt="" class="img img-responsive">
						<?php endif ?>
					</p>
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
<?php 
$form = new Zea();
$form->init('edit');
$form->setEditStatus(false);
$form->setHeading('Ubah Status');
$form->setTable('order_koran');
$form->setId($data['id']);
$form->addInput('status_pembayaran','dropdown');
$form->setLabel('status_pembayaran','Status Pembayaran');
$form->setOptions('status_pembayaran',['Belum Transfer','Sudah Transfer']);
$form->addInput('status_order','dropdown');
$form->setLabel('status_order','Status Order');
$form->setOptions('status_order',['Belum Tayang','Sudah Tayang']);
$form->form();
?>