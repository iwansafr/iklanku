<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
	.sign-in-b{
		border-radius: 1.3rem;
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
<div class="title text-center mt-5">
	<div class="title mt-5 mb-3">
		<h5 class="font-weight-bold" style="font-size: 5vw;">Sign-in</h5>
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
		</div>
	</form>
	<div class="space mb-3 mt-5">
		<h6 style="font-size: 3vw">Lupa password ? <a href="<?php echo base_url('home/sign_up') ?>" class="text-danger">Buat Baru</a></h6>
	</div>
	<button class="btn btn-sm btn-info pl-3 pr-3 mb-5 mt-3 rounded"><h1 style="font-size: 7vw;">masuk</h1></button>
	<br>
	<button class="sign-in-b mb-2 btn" style="padding-top: 2vw;"> <img src="<?php echo base_url('images/');?>google.png" style="height: 5vw;margin-top: -2vw;"> <span style="font-size: 3vw;">Sign in with Google</span></button>
	<br>
	<button class="sign-in-b btn mb-5"><img src="<?php echo base_url('images/');?>facebook.png" style="height: 6vw;"> Sign in with Facebook</button>
	<h6 style="font-size: 3vw">Belum punya Akun ? <a href="<?php echo base_url('home/sign_up') ?>" class="text-danger">Daftar Baru</a></h6>
</div>