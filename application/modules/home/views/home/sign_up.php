<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
	body{
		font-family: 'comfortaaregular';
		background-color: #f8f9fa!important;
	}
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
<div class="title text-center mt-5">
	<div class="title mt-5 mb-5">
		<h5 class="font-weight-bold" style="font-size: 5vw;">Sign Up</h5>
	</div>
	<form action="" method="post">
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
	</form>
  <div class="row">
  	<div class="col"></div>
  	<div class="col-7">
		  <label class="containers" style="font-size: 3vw;"> Berlangganan <span class="text-info">NewsLetter</span>
			  <input type="checkbox">
			  <span class="checkmark"></span>
			</label>
  	</div>
  	<div class="col"></div>
  </div>
	<button class="btn btn-sm btn-info pl-5 pr-5 mb-5 mt-3"><h1 style="font-size: 7vw;padding-top: 2vw;">daftar</h1></button>
	<br>
</div>
