	<style>
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
		.form-group{
			width: 90%;
			margin: auto;
		}
		::placeholder {
		  color: #4950575c!important;
		}
		input:focus, textarea:focus, select:focus{
      outline: none!important;
    }
    .custom{
	    display: block;
	    width: 100%;
	    height: calc(1.5em + .75rem + 2px);
	    padding: .375rem .75rem;
	    font-size: 1rem;
	    font-weight: 400;
	    line-height: 1.5;
	    color: #495057;
	    background-color: #fff;
	    background-clip: padding-box;
	    border: 1px solid #ced4da;
	    border-radius: .25rem;
	    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		}
	</style>	
<div class="title text-center mt-5 pt-2">
	<form action="" method="get" class="mt-1">
		<div class="form-group mb-2">
			<div class="input-group">
				<i class="fa fa-search placeh"></i>
				<input type="text" name="kota" placeholder="ketik nama kota / kabupaten" class="custom" value="<?php echo !empty($_GET['kota']) ? $_GET['kota'] : ''; ?>">
			</div>
		</div>
		<div class="form-group mb-2">
			<div class="input-group">
				<i class="fa fa-search placeh"></i>
				<input type="text" name="jalan" placeholder="ketik nama ruas jalan" class="custom" value="<?php echo !empty($_GET['jalan']) ? $_GET['jalan'] : ''; ?>">
			</div>
		</div>
		<button type="submit" class="btn btn-sm btn-info" style="width: 90%;border-radius: 0.5rem; font-size: 4vw;">Search</button>
	</form>
	<br>
	<div class="filter text-left mb-3 ml-4 mr-4">
		<form action="" method="get">
				<button class="btn btn-sm btn-light">
					<i class="fa fa-filter"></i> <span style="text-decoration: underline;text-decoration-style:dotted; font-size: 3vw;">Filter</span>
				</button>
				<button type="button" class="btn btn-secondary btn-sm" style="font-size: 2.5vw;" id="media-opsi" data-toggle="modal" data-target="#media-modal">
				  Semua Media
				</button>
				<input type="hidden" value="0" name="media">
				<button type="button" class="btn btn-secondary btn-sm" style="font-size: 2.5vw;" id="dimensi-opsi" data-toggle="modal" data-target="#dimensi-modal">
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
<?php pr($data['query']) ?>
<?php $slide = false; ?>
<?php if ($slide): ?>
	<?php $this->load->view('home/list_slide') ?>
<?php else: ?>
	<?php $this->load->view('home/list_scroll') ?>
<?php endif ?>
<script>

</script>