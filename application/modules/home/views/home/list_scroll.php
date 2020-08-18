<?php if (!empty($data)): ?>
	<div id="product" style="padding: 20px;">
		<?php foreach ($data['data'] as $key => $value): ?>
			<div class="card mb-3 product_box">
				<span class="badge badge-success pull-right" style="width: 20vw;padding-top: 1vw; position: absolute;top: 2vw;right: 10px;font-size: 3vw;"><?php echo $status[$value['status']] ?></span>
				<a href="<?php echo base_url('home/detail/'.$value['id']) ?>" ><img style="border-top-right-radius: 10%;border-top-left-radius: 10%;" src="<?php echo image_module('iklan',$value['id'].'/'.$value['map_image']) ?>" class="card-img-top" alt="..."></a>
			  <div class="card-body">
			  	<div class="row">
				    <div class="col">
				    	<p style="margin-block-end: 0;font-size: 3vw; font-weight: bold;"><?php echo $value['kota'] ?></p>
				    	<p style="font-size: 3vw;"><?php echo $value['jalan'] ?></p>
				    </div>
				    <div class="col-7 description_product pl-0">
				    	<p class="card-text">
				    		<small style="font-size: 2.2vw;" class="text-muted">
				    			<?php echo $jenis[$value['jenis']] ?> / <?php echo $ukuran[$value['ukuran']] ?>	 M /
				    			<br>
				    			<?php echo $dimensi[$value['dimensi']] ?> / <?php echo $light[$value['light']] ?>
				    		</small>
				    	</p>
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
	if(!empty($data['pagination'] && !empty($full)))
	{
		?>
		<div class="text-center">
			<button class="btn btn-sm btn-default" id="load_more" page="1" kota="<?php echo !empty($_GET['kota']) ? htmlentities($_GET['kota']) : ''; ?>" jalan="<?php echo !empty($_GET['jalan']) ? $_GET['jalan'] : ''; ?>" style="background: white;width: 90%;border-radius: 0.5rem;">Tampilkan Lainnya</button>
			<hr>
		</div>
		<?php
	}
	?>
<?php endif ?>
      
  