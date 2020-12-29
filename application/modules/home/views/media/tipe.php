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
			border-radius: 10%;
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
		.ui-widget {
	    font-size: 1em;
		}
	</style>	
<div class="title text-center mt-5 pt-5">
	<form action="" method="get" class="mt-1">
		<div class="form-group mb-2">
			<div class="input-group">
				<i class="fa fa-search placeh" style="z-index: 0;"></i>
				<input type="text" name="jalan" placeholder="ketik nama <?php echo $label;?>" class="custom" value="<?php echo !empty($_GET['jalan']) ? $_GET['jalan'] : ''; ?>" >
			</div>
		</div>
		<button type="submit" class="btn btn-sm btn-primary" style="background-color:#0872ba;width: 90%;border-radius: 0.5rem; font-size: 4vw;">Search</button>
	</form>
	<br>
	</div>
</div>
<?php $this->load->view('media/list_scroll') ?>
<script>

</script>