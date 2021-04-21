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
	<?php $get = $this->input->get(); ?>
	<?php $user = $this->session->userdata(base_url().'_logged_in') ?>
	<?php 
	pr($get);die();
	?>
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url('home/media/next_order/'.$data['id'].'?tipe='.$get['tipe'].'&time='.$get['time'].'&durasi='.$get['durasi'].'&masa='.$get['masa']) ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Konfirmasi Order
			</span>
			<hr>
		</div>
	</div>
	<?php if (!empty($data)): ?>
		<?php if ($data['tipe'] == 1): ?>
			<form action="<?php echo base_url('home/media/finish_order/'.$data['id']) ?>" method="post">
				<input type="hidden" name="tipe" value="<?php echo $get['tipe'] ?>">
				<input type="hidden" name="time" value="<?php echo $get['time'] ?>">
				<input type="hidden" name="durasi" value="<?php echo $get['durasi'] ?>">
				<input type="hidden" name="masa" value="<?php echo $get['masa'] ?>">
				<input type="hidden" name="kategori" value="<?php echo $get['kategori'] ?>">
				<input type="hidden" name="iklan" value="<?php echo $get['iklan'] ?>">
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
									<span style="font-size: 3vw;color: grey;">Kategori</span><br>
									<?php echo $this->media_model->kategori_radio()[$get['kategori']] ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Tipe Iklan</span><br>
									<?php echo $this->media_model->tipe_radio()[$get['tipe']].' / '.$this->media_model->time_radio()[$get['time']] ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Masa Tayang</span><br>
									<?php echo $get['durasi'].' '.$this->media_model->masa_radio()[$get['masa']] ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<span style="font-size: 3vw;color: grey;">Isi Iklan</span><br>
									<p style="font-size: 3vw;">
										<?php echo $get['iklan'] ?>
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
				<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
					ORDER
				</button>
			</form>
		<?php elseif($data['tipe'] == 2): ?>
		<?php endif ?>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>