<?php if (!empty($data)): ?>
	<?php foreach ($data['data'] as $key => $value): ?>
		<div class="card mb-3 product_box">
			<span class="badge badge-success pull-right" style="width: 20vw;padding-top: 1vw; position: absolute;top: 2vw;right: 10px;font-size: 3vw;"><?php echo $status[$value['status']] ?></span>
			<a href="<?php echo base_url('home/detail') ?>" ><img style="border-top-right-radius: 10%;border-top-left-radius: 10%;" src="<?php echo image_module('iklan',$value['id'].'/'.$value['map_image']) ?>" class="card-img-top" alt="..."></a>
		  <div class="card-body">
		  	<div class="row">
			    <div class="col">
			    	<h5 class="card-title" style="font-size: 4vw;"><?php echo $value['kota'] ?></h5>
			    </div>
			    <div class="col-7 description_product pl-0">
			    	<p style="font-size: 3vw;margin-bottom: -1vw;"><?php echo $value['jalan'] ?></p>
			    	<p class="card-text">
			    		<small style="font-size: 2vw;" class="text-muted">
			    			<?php echo $value['panjang'] ?>x <?php echo $value['lebar'] ?>	 M / <?php echo $dimensi[$value['dimensi']] ?> / <?php echo $light[$value['light']] ?>
			    		</small>
			    	</p>
			    </div>
		  	</div>
		  </div>
		</div>
	<?php endforeach ?>
	<?php echo $data['pagination'] ?>
<?php else: ?>
	<?php msg('Data yang Anda Inginkan Tidak Ditemukan','danger') ?>
<?php endif ?>
      
  