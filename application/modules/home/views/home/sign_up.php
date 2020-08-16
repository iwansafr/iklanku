<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
	.form-control{
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
	.containers {
	  display: block;
	  position: relative;
	  /*padding-left: 35px;*/
	  margin-bottom: 12px;
	  cursor: pointer;
	  font-size: 22px;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}

	/* Hide the browser's default checkbox */
	.containers input {
	  position: absolute;
	  opacity: 0;
	  cursor: pointer;
	  height: 0;
	  width: 0;
	}

	/* Create a custom checkbox */
	.checkmark {
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 20px;
	  width: 20px;
	  background-color: white;
	  border: 1px grey solid;
	  border-radius: 5px;
	}

	/* On mouse-over, add a grey background color */
	.containers:hover input ~ .checkmark {
	  background-color: #17a2b8;
	}

	/* When the checkbox is checked, add a blue background */
	.containers input:checked ~ .checkmark {
	  background-color: #2196F3;
	}

	/* Create the checkmark/indicator (hidden when not checked) */
	.checkmark:after {
	  content: "";
	  position: absolute;
	  display: none;
	}

	/* Show the checkmark when checked */
	.containers input:checked ~ .checkmark:after {
	  display: block;
	}

	/* Style the checkmark/indicator */
	.containers .checkmark:after {
	  left: 9px;
	  top: 5px;
	  width: 5px;
	  height: 10px;
	  border: solid white;
	  border-width: 0 3px 3px 0;
	  -webkit-transform: rotate(45deg);
	  -ms-transform: rotate(45deg);
	  transform: rotate(45deg);
	}
</style>
<div class="title text-center mt-5 pt-5">
	<div class="title mt-5">
		<h5 class="font-weight-bold" style="font-size: 5vw;">SIGN UP</h5>
	</div>
	<form action="" method="post">
		<div class="container" style="padding-right: 60px; padding-left: 60px;">
			<div class="form-group">
				<div class="input-group">
					<i class="fa fa-user placeh"></i>
					<input type="text" name="namauser" placeholder="username" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<i class="fa fa-envelope placeh"></i>
					<input type="text" name="email" placeholder="email address" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<i class="fa fa-lock placeh"></i>
					<input type="password" name="sandi" placeholder="password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<i class="fa fa-phone placeh"></i>
					<input type="text" name="number" placeholder="mobile number" class="form-control">
				</div>
			</div>
  		<div class="form-inline mt-3 mb-3">
	  		<input type="checkbox" style="width: 30px;height: 5vw;">
	  		<div class="text ml-2" style="font-size: 3vw;">
	  			Cek jika anda <span style="font-weight: bold;font-style: italic;">Agensi Periklanan</span>
	  		</div>
  		</div>
			<button class="btn btn-sm btn-primary btn-lg" style="border-radius: 1.5rem;width: 100%;background-color:#0872ba;line-height: 9vw;font-size: 4vw;font-weight: bold;">
				SIGN UP
			</button>
			<br>
		</div>
	</form>
</div>
