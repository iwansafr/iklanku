	<style>
		body{
			font-family: 'comfortaaregular';
			background-color: #f8f9fa!important;
		}
		input.custom{
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
		.filter{
			font-size: 22px;
		}
		.product{
			margin-bottom: 10px; 
		}
		.product_box{
			border-radius: 1.2rem;
		}
		.description_product{
			text-align: right;
		}
		.card-text{
			font-size: 12px!important;
		}
		.carousel-indicators li {
			background-color: grey;
			background-color: grey;
	    height: 10px;
	    width: 10px;
		}
	</style>
<div class="title text-center mt-5">
	<form action="" method="post">
		<div class="form-group">
			<div class="input-group">
				<i class="fa fa-search placeh"></i>
				<input type="text" name="kota" placeholder="masukkan nama kota / kabupaten" class="form-control custom">
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<i class="fa fa-search placeh"></i>
				<input type="text" name="kota" placeholder="masukkan nama ruas jalan" class="form-control custom">
			</div>
		</div>
		<button class="btn btn-lg btn-info" style="width: 100%;border-radius: 1.2rem;">Search</button>
	</form>
	<br>
	<div class="filter text-left mb-3">
		<form action="" method="get">
				<button class="btn btn-sm btn-light">
					<i class="fa fa-filter"></i> <span style="text-decoration: underline;text-decoration-style:dotted;">Filter</span>
				</button>
				<button type="button" class="btn btn-secondary btn-sm" id="media-opsi" data-toggle="modal" data-target="#media-modal">
				  Semua Media
				</button>
				<input type="hidden" value="0" name="media">
				<button type="button" class="btn btn-secondary btn-sm" id="dimensi-opsi" data-toggle="modal" data-target="#dimensi-modal">
				  Semua Ukuran
				</button>
				<input type="hidden" value="0" name="dimensi_l">
				<input type="hidden" value="0" name="dimensi_t">
		</form>
		<div class="modal fade" id="media-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Pilih Media</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <button data-dismiss="modal" value="1" class="media-iklan w-100 btn btn-sm btn-secondary">Semua</button>
		        <button data-dismiss="modal" value="1" class="media-iklan w-100 btn btn-sm btn-secondary">billboard</button>
		        <button data-dismiss="modal" value="2" class="media-iklan w-100 btn btn-sm btn-secondary">baliho</button>
		        <button data-dismiss="modal" value="3" class="media-iklan w-100 btn btn-sm btn-secondary">videotron</button>
		      </div>
		      <div class="modal-footer">
		      </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade" id="dimensi-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Pilih Dimensi</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="form-row">
			        <div class="col">
					      <div class="input-group mb-2">
					        <input value="0" id="dimensi_lebar" type="number" min="0" class="form-control" placeholder="lebar">
					        <div class="input-group-apend">
					          <div class="input-group-text">M</div>
					        </div>
					      </div>
					    </div>
					    x
			        <div class="col">
					      <div class="input-group mb-2">
					        <input value="0" id="dimensi_tinggi" type="number" min="0" class="form-control" placeholder="tinggi">
					        <div class="input-group-apend">
					          <div class="input-group-text">M</div>
					        </div>
					      </div>
					    </div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		      	<button class="btn btn-sm btn-info" id="simpan_dimensi" data-dismiss="modal">Simpan</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="100000">
  <ol class="carousel-indicators" style="bottom: -30px;color: black;">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="product">
				<div class="card mb-3 product_box">
					<span class="badge badge-success pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">available</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Majapahit</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Vertical</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
				<div class="card mb-3 product_box">
					<span class="badge badge-danger pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">unavailable</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Prof Hamka</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Horizontal</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
			</div>
    </div>
    <div class="carousel-item">
      <div class="product">
				<div class="card mb-3 product_box">
					<span class="badge badge-success pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">available</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Majapahit</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Vertical</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
				<div class="card mb-3 product_box">
					<span class="badge badge-danger pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">unavailable</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Prof Hamka</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Horizontal</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
			</div>
    </div>
    <div class="carousel-item">
      <div class="product">
				<div class="card mb-3 product_box">
					<span class="badge badge-success pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">available</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Majapahit</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Vertical</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
				<div class="card mb-3 product_box">
					<span class="badge badge-danger pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">unavailable</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Prof Hamka</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Horizontal</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
			</div>
    </div>
    <div class="carousel-item">
      <div class="product">
				<div class="card mb-3 product_box">
					<span class="badge badge-success pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">available</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Majapahit</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Vertical</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
				<div class="card mb-3 product_box">
					<span class="badge badge-danger pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">unavailable</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Prof Hamka</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Horizontal</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
			</div>
    </div>
    <div class="carousel-item">
      <div class="product">
				<div class="card mb-3 product_box">
					<span class="badge badge-success pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">available</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Majapahit</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Vertical</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
				<div class="card mb-3 product_box">
					<span class="badge badge-danger pull-right" style="width: 100px; position: absolute;top: 10px;right: 10px;">unavailable</span>
					<a href="<?php echo base_url('home/detail') ?>" ><img src="<?php echo base_url('templates/iklanku/');?>img/map.jpg" class="card-img-top" alt="..."></a>
				  <div class="card-body">
				  	<div class="row">
					    <div class="col">
					    	<h5 class="card-title">Kota Semarang</h5>
					    </div>
					    <div class="col description_product">
					    	<p>Jl. Prof Hamka</p>
					    	<p class="card-text">
					    		<small class="text-muted">Billboard</small>
					    		/
					    		<small class="text-muted">5x10 M</small>
					    		/
					    		<small class="text-muted">Horizontal</small>
					    		/
					    		<small class="text-muted">FL</small>
					    	</p>
					    </div>
				  	</div>
				  </div>
				</div>
			</div>
    </div>
  </div>
</div>
<script>

</script>