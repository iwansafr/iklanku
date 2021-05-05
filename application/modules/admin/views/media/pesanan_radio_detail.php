<div class="panel panel-default" style="border-radius: 0.5rem;">
	<a href="<?= base_url('admin/pesanan_radio') ?>" class="btn btn-info btn-sm">
		<i class="fa fa-arrow-left"></i>
		Kembali
	</a>
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
					<span style="font-size: 3vw;color: grey;">Kategori</span><br>
					<?php echo $this->media_model->kategori_radio()[$data['kategori']] ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Tipe Iklan</span><br>
					<?php echo $this->media_model->tipe_radio()[$data['tipe']].' / '.$this->media_model->time_radio()[$data['time']] ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Masa Tayang</span><br>
					<?php echo $data['durasi'].' '.$this->media_model->masa_radio()[$data['masa']] ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Isi Iklan</span><br>
					<p style="font-size: 3vw;">
						<?php echo $data['iklan'] ?>
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
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Username Pemesanan</span><br>
					<span><?php echo $data['username'] ?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Email Pemesanan</span><br>
					<span><?php echo $data['email'] ?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<span style="font-size: 3vw;color: grey;">Bukti Transfer</span><br>
					<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
						<i class="fa fa-search"></i> Lihat
					</button>
					<div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Bukti Transfer</h4>
					      </div>
					      <div class="modal-body">
					        <img src="<?php echo image_module('order_radio',$data['id'].'/'.$data['photo']) ?>" class="img img-responsive" alt="">
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div>
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
$form->setTable('order_radio');
$form->setId($data['id']);
$form->addInput('status_pembayaran','dropdown');
$form->setLabel('status_pembayaran','Status Pembayaran');
$form->setOptions('status_pembayaran',['Belum Transfer','Sudah Transfer']);
$form->addInput('status_order','dropdown');
$form->setLabel('status_order','Status Order');
$form->setOptions('status_order',['Belum Tayang','Sudah Tayang']);
$form->form();
?>