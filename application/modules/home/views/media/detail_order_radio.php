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
			<a href="<?= base_url() ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Detail Order
			</span>
			<hr>
		</div>
	</div>
	<?php if (!empty($data)): ?>
		<?php if ($data['tipe'] == 1): ?>
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
								<?php echo $this->media_model->kategori_radio()[$data['kategori']] ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<span style="font-size: 3vw;color: grey;">Tipe Iklan</span><br>
								<?php echo $this->media_model->tipe_radio()[$data['tipe']].' / '.$this->media_model->time_radio()[$data['time']] ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<span style="font-size: 3vw;color: grey;">Masa Tayang</span><br>
								<?php echo $data['durasi'].' '.$this->media_model->masa_radio()[$data['masa']] ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<span style="font-size: 3vw;color: grey;">Isi Iklan</span><br>
								<p style="font-size: 3vw;">
									<?php echo $data['iklan'] ?>
								</p>
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
		<?php elseif($data['tipe'] == 2): ?>
		<?php endif ?>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>