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
	.v4{
		font-size: 4vw;
	}
	.v25{
		font-size: 2.5vw;
	}
	.v2{
		font-size: 2vw;
	}
	body{
		line-height: 0.8;
	}
</style>
<div class="container mt-5 pt-5 " id="pageSewa">
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url('home/iklan/media') ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Digital Printing
			</span>
			<hr>
			<div class="row" style="padding: 10px 30px 0 30px;">
				<?php foreach ($menu as $key => $value): ?>
					<div class="col-6 text-center mb-3">
						<div class="card" style="border-radius: 1.5rem;height: 110px; margin: auto;">
							<div style="margin: auto;">
								<span class="v4 font-weight-bold" style="margin-bottom: 0px;"><?php echo $value['title'] ?></span>
								<div class="clearfix"></div>
								<span class="v2"><?php echo $value['description'] ?></span>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				<div class="col-6 text-center mb-3">
					<div class="card" style="border-radius: 1.5rem;height: 110px; margin: auto; background: #2522221c; color: #2522221c;">
						<div style="margin: auto;">
							<span class="v4 font-weight-bold" style="margin-bottom: 0px;">MENU X</span>
							<div class="clearfix"></div>
							<span class="v2"></span>
						</div>
					</div>
				</div>
				<div class="col-6 text-center mb-3">
					<div class="card" style="border-radius: 1.5rem;height: 110px; margin: auto; background: #2522221c; color: #2522221c;">
						<div style="margin: auto;">
							<span class="v4 font-weight-bold" style="margin-bottom: 0px;">MENU X</span>
							<div class="clearfix"></div>
							<span class="v2"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>