<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
	body{
		font-family: 'comfortaaregular';
		background-color: #f8f9fa!important;
	}
	input{
		height: 60px!important;
		border-radius: 1.2rem!important;
		background-color: white!important;
		text-align: center;
	}
	.placeh{
		font-size: 30px;
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
		font-size: 12px;
		width: 200px;
		text-align: left;
	}
	.sign-in-b:hover{
		background-color: #17a2b8;
	}
</style>
<br>
<br>
<br>
<div class="title text-center mt-5 pt-5">
	<div class="title mt-5 mb-5">
		<h5 class="font-weight-bold" style="font-size: 26px;">Sign-in</h5>
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
	<div class="space mb-5 mt-5">
		<h6>Lupa password ? <span class="text-danger">Buat Baru</span></h6>
	</div>
	<button class="btn btn-lg btn-info pl-5 pr-5 mb-5 mt-3" style="border-radius: 1.3rem;"><h1>masuk</h1></button>
	<br>
	<button class="sign-in-b mb-2 btn"> <img src="<?php echo base_url('images/');?>google.png" height="25"> Sign in with Google</button>
	<br>
	<button class="sign-in-b btn mb-5"><img src="<?php echo base_url('images/');?>facebook.png" style="image-fit: cover; height: 25px;" height="30"> Sign in with Facebook</button>
	<h6>Belum punya Akun ? <a href="#" class="text-danger">Daftar Baru</a></h6>
</div>