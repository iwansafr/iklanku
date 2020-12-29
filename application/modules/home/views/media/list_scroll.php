<?php if (!empty($data)): ?>
	<div id="product" style="padding: 20px;">
		<?php foreach ($data['data'] as $key => $value): ?>
			<div class="card mb-3 product_box">
				<span class="badge badge-primary pull-right" style="width: 20vw;padding-top: 1vw; position: absolute;top: 2vw;right: 10px;font-size: 3vw;"><?php echo $label ?></span>
				<a href="<?php echo base_url('home/media/order/'.$value['id']) ?>" ><img style="border-top-right-radius: 10%;border-top-left-radius: 10%;" src="<?php echo image_module('media',$value['id'].'/'.$value['photo']) ?>" class="card-img-top" alt="..."></a>
			  <div class="card-body">
			  	<div class="row">
				    <div class="col">
				    	<p style="margin-block-end: 0;font-size: 3vw; font-weight: bold;"><?php echo $value['nama'] ?></p>
				    </div>
				    <div class="col-7 description_product">
				    	<p style="font-size: 3vw;"><?php echo $value['alamat'] ?></p>
				    </div>
			  	</div>
			  </div>
			</div>
		<?php endforeach ?>
	</div>
	<div id="loading" class="text-center d-none">
		<label for="">loading ...</label>
	</div>
	<?php
	$hiddenclass = 'd-none';
	if(!empty($data['pagination'] && !empty($full)))
	{
		$hiddenclass = '';
	}
	?>
	<div class="text-center">
		<button class="btn btn-sm btn-default <?php echo $hiddenclass ?>" id="load_more" page="1" tipe="<?php echo $tipe_id;?>" nama="<?php echo !empty($_GET['nama']) ? htmlentities($_GET['nama']) : ''; ?>" style="background: white;width: 90%;border-radius: 0.5rem;">Tampilkan Lainnya</button>
		<hr>
	</div>
<?php endif ?>
      
  