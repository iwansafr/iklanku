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
</style>
<div class="container mt-5 pt-5 " id="pageSewa">
	<?php $get = $this->input->get(); ?>
	<?php $user = $this->session->userdata(base_url().'_logged_in') ?>
	<?php $bank = $this->db->get_where('bank_account')->result_array(); ?>
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url('home/digital_print/') ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Status Pembayaran
			</span>
			<hr>
		</div>
	</div>
	<?php if (!empty($data)): ?>
		<?php $param = json_decode($data['param'],1) ?>
		<div class="card card-default" style="border-radius: 0.5rem;">
			<div class="card-body">
				<div class="row">
					<div class="col">
						<div class="form-group text-center" style="margin: auto;">
							<?php $confirmed = ['BELUM TRANSFER', 'TRANSFER TERKONFIRMASI'] ?>
							<span><?php echo $confirmed[$data['status_pembayaran']] ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if (empty($data['status_pembayaran'])): ?>
			<div class="container">
				<hr>
				<div class="form-group font-weight-bold text-center" style="margin: auto;">
					<span>Rp. <?php echo number_format($param['Biaya'],0,0,'.') ?></span>
				</div>
				<hr>
				<div class="form-group">
					<span class="v3">
						Harap Transfer sesuai Nominal di atas ke nomor rekening  di bawah :
					</span>
				</div>
				<?php if (!empty($bank)): ?>
					<?php foreach ($bank as $value): ?>
						<div class="form-group">
							<div class="row">
								<div class="col-4">
									<img src="<?php echo image_module('bank_account',$value['id'].'/'.$value['icon']) ?>" class="img img-fluid" height="50">
								</div>
							</div>
							<span class="v3">
								<?= $value['bank_name'] ?>
							</span>
							<div class="clearfix"></div>
							<span class="v3 font-weight-bold">
								<?= $value['bank_number'] ?>
							</span>
							<div class="clearfix"></div>
							<span class="v3">
								an. <?= $value['person_name'] ?>
							</span>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
			<br>
			<a href="<?= base_url('home/media/konfirmasi_pembayaran/'.$data['id']) ?>" class="btn btn-sm btn-primary btn-lg text-white" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
				KONFIRMASI PEMBAYARAN
			</a>
			<div class="clearfix mb-1"></div>
			<a href='https://wa.me/<?php echo $meta['contact']['wa'] ?>?text=saya-ingin-konfirmasi' class="btn btn-sm btn-success btn-lg text-white" id="submit" style="border-radius: 0.5rem;width: 100%;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
				KONFRIMASI VIA WHATSAPP
			</a>
		<?php else: ?>
			<div class="container">
				<div class="form-group mt-3">
					<span class="v3">
						Terima Kasih,
					</span>
				</div>
				<div class="form-group">
					<span class="v3">
						Transfer telah terkonfirmasi, Order Pasang Iklan anda akan segera kami proses. Pastikan nomor handphone anda aktif dan dapat dihubungi.
					</span>
				</div>
			</div>
			<br>
			<a href="<?= base_url() ?>" class="btn btn-sm btn-primary btn-lg text-white" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
				MENU UTAMA
			</a>
			<div class="clearfix mb-1"></div>
			<a href="<?php echo base_url('home/digital_print/pesanan_detail/'.$data['id']) ?>" class="btn btn-sm btn-success btn-lg text-white" id="submit" style="border-radius: 0.5rem;width: 100%;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
				LIHAT DETAIL ORDER
			</a>
		<?php endif ?>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>