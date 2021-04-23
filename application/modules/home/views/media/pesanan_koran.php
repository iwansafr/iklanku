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
	.v3{
		font-size: 3vw;
	}
	.v2{
		font-size: 2vw;
	}
</style>
<div class="container mt-5 pt-5 " id="pageSewa">
	<?php $get = $this->input->get(); ?>
	<?php $user = $this->session->userdata(base_url().'_logged_in') ?>
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url() ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Pesanan Koran
			</span>
			<hr>
		</div>
	</div>
	<div id="produk">
		<?php if (!empty($data)): ?>
			<?php 
			$tipe_koran = $this->media_model->tipe_koran();
			$time_radio = $this->media_model->time_radio();
			$masa_radio = $this->media_model->masa_radio();
			?>
			<?php foreach ($data as $key => $value): ?>
				<a href="<?php echo base_url('home/media/status_pembayaran/'.$value['id'].'/'.$value['media_id']) ?>" >
					<div class="card mb-3 product_box">
					  <div class="card-body">
							<div class="row">
								<div class="col-3">
									<img style="border-top-right-radius: 10%;border-top-left-radius: 10%; object-fit: contain; height: 75px;" src="<?php echo image_module('media',$value['id_media'].'/'.$value['gambar_media']) ?>" class="card-img-top" alt="...">
								</div>
								<div class="col" style="margin: auto;">
									<span class="align-middle"><?= $value['nama_media'] ?></span>
									<br>
									<span class="v2"><?php echo $value['durasi'].' '.$masa_radio[$value['masa']] ?></span>
									<div class="clearfix"></div>
									<span class="v2">Rp <?php echo number_format($value['total'],0,0,'.') ?></span>
								</div>
							</div>
					  </div>
					</div>
				</a>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div>