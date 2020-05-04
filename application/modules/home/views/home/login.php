<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
	input{
		height: 12vw!important;
		border-radius: 1.2rem!important;
		background-color: white!important;
		text-align: center;
	}
	.placeh{
		font-size: 6vw;
		color: #656363!important;
		position: absolute;
    z-index: 9;
    top: 12px;
    left: 16px;
	}
	.sign-in-b{
		border-radius: 1.3rem;
		background: white;
		border: 1px black solid;
		vertical-align: center;
		font-size: 3vw;
		width: 200px;
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
		<div class="form-group">
			<div class="input-group">
				<i class="fa fa-user placeh"></i>
				<input type="text" name="namauser" placeholder="username / email" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<i class="fa fa-lock placeh"></i>
				<input type="password" name="sandi" placeholder="password" class="form-control">
			</div>
		</div>
	</form>
	<div class="space mb-3 mt-5">
		<h6 style="font-size: 3vw">Lupa password ? <span class="text-danger">Buat Baru</span></h6>
	</div>
	<button class="btn btn-sm btn-info pl-3 pr-3 mb-5 mt-3 rounded"><h1 style="font-size: 7vw;padding-top: 2vw;">masuk</h1></button>
	<br>
	<button class="sign-in-b mb-2 btn"> <img src="<?php echo base_url('images/');?>google.png" style="height: 5vw;"> Sign in with Google</button>
	<br>
	<button class="sign-in-b btn mb-5"><img src="<?php echo base_url('images/');?>facebook.png" style="height: 6vw;"> Sign in with Facebook</button>
	<h6 style="font-size: 3vw">Belum punya Akun ? <a href="<?php echo base_url('home/sign_up') ?>" class="text-danger">Daftar Baru</a></h6>
</div>