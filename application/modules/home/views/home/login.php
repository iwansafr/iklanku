<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
	body{
		background-color: white!important;
	}
	.sign-in-b{
		border-radius: 1.5rem;
		background: white;
		border: 1px black solid;
		vertical-align: center;
		font-size: 3vw;
		width: 50vw;
		text-align: center;
	}
	.sign-in-b:hover{
		background-color: #17a2b8;
	}
</style>
<div class="title text-center mt-5 mb-5">
	<div class="logo mb-5">
		<img src="<?php echo base_url('images/icon.png') ?>" width="110" class="img img-fluid" alt="">
	</div>
	<form action="" method="post">
		<div class="container" style="padding-right: 60px; padding-left: 60px;">
				<div class="form-group">
					<div class="input-group">
						<i class="fa fa-user placeh"></i>
						<input type="text" name="namauser" placeholder="username / email" class="form-control custom" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<i class="fa fa-lock placeh"></i>
						<input type="password" name="sandi" placeholder="password" class="form-control custom" autocomplete="off">
					</div>
				</div>
			<a href="<?php echo base_url('home/iklan/media') ?>" class="btn btn-sm btn-primary btn-lg" style="border-radius: 1.5rem;width: 100%;background-color:#0872ba;line-height: 9vw;font-size: 4vw;font-weight: bold;">
				SIGN IN
			</a>
			<div class="space mb-3 mt-5">
				<h6 style="font-size:3vw;">Belum punya Akun ? <a href="<?php echo base_url('home/sign_up') ?>" class="text-danger">Daftar Baru</a> Lupa password </h6>
			</div>
			<center style="font-style: italic;" class="mt-5 pt-5">
				by DnE
			</center>
		</div>
	</form>
</div>